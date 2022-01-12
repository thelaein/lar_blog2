<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $with = ['user','category','photos','tags'];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //accessor
    public function getTitleAttribute($value){
        return Str::words($value,5);

    }
    public function getShowCreatedAtattribute(){
        return ' <p>
                      <i class="fas fa-calendar"></i>
                      '.$this->created_at->format('d / m / Y').'
                  </p>

                   <p>
                         <i class="fas fa-clock"></i>
                          '.$this->created_at->format('h:i a').'
                    </p>';
}

    //mutator
    public function setSlugAttribute($value){
        return $this->attributes['slug'] = Str::slug($value);
    }

    //query scope, local scope
    public function scopeSearch($query){
        if (isset(request()->search)){
            $keyword = request()->search;
            $query->orWhere('title','like','%'.$keyword.'%')->orWhere('description','like',"%$keyword%");
        }
    }

protected static function boot()
{
    parent::boot(); // TODO: Change the autogenerated stub
    static ::created(function (){
      DB::listen(function ($query){
          logger(json_encode($query));
      });
    });
}


}
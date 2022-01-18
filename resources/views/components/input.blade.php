<div class="mb-3">
    <label>{{$inputLabel}}</label>
    <input type="text"
           name="{{$name}}"
           @if($value)
           value="{{old($value,$name)}}"
           @else
           value="{{old($name)}}"
           @endif
           class="form-control @error($name) is-invalid @enderror">
    @error($name)
    <p class="text-danger small">{{$message}}</p>
    @enderror
</div>

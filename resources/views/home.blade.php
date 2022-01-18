@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{--                    {{ __('You are logged in!') }}--}}


{{--                    {{auth()->user()->photos}}--}}

                    {{$my}}


                        <x-alert class="py-5" type="danger">San Kyi Tar</x-alert>
                        <x-alert class="py-1">Hello</x-alert>
{{--                    <x-alert />--}}




                </div>
            </div>
        </div>
    </div>
</div>
@endsection

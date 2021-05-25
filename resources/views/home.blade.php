@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h1 style="text-align: center">
                    <b style="color: #1b4b72"> {{$user->name}}</b> Welcome Your Profile
                </h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}

                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>

    </div>
    <br>
    <div>
        <button class="btn-secondary"><a href="{{route('pet.index')}}">Go It</a></button>
    </div>


</div>
@endsection

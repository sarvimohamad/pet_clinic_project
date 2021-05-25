@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-start">
                <div>
                <h1>vet list</h1>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>speciality</th>
                        <th>morning</th>
                        <th>afternoon</th>
                        <th>evening</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($list as $vet)
                        <tr>
                            <th><a href="{{route('appointment.index',['vet_id' => $vet->id])}}">{{$vet->user->name}}</a></th>
                            <th>{{$vet->speciality}}</th>
                            <th class="text-success text-center">@if($vet->morning) █ @endif</th>
                            <th class="text-success text-center">@if($vet->afternoon) █ @endif</th>
                            <th class="text-success text-center">@if($vet->evening) █ @endif</th>
                        </tr>
                    @endforeach
                    {{--                                    @endcan--}}

                    </tbody>
                </table>
                </div>
                <hr>



                @if (Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif



        @can('checkIsAdmin',App\Models\User::class)

            <button class="btn-link btn-dark " id="v-pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-profile" type="button" role="tab"
                    aria-controls="v-pills-profile" aria-selected="true">
                <a href="{{route('vet.create')}}">Create Vets</a>
            </button>
        @endcan
            </div>
        </div>

    </section>
@endsection


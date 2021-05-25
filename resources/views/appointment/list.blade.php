@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row align-items-start">
                        <div class="col-6">
                            <h1>appointments list</h1>

                            @if($get_appointment_id)
                                <div>Delete appointment<a
                                        href="{{route('appointment.undo' , ['appointment_id'=>$get_appointment_id])}}">Undo</a>
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>pet_id</th>
                                    <th>vet_id</th>
                                    <th>appointment_date</th>
                                    <th>morning</th>
                                    <th>afternoon</th>
                                    <th>evening</th>
                                    <th>delete</th>


                                </tr>
                                </thead>

                                <tbody>
                                @foreach($lists as $list)
                                    <tr>
                                        <td>{{$list->pet->name}}</td>
                                        <td>{{$list->vet->user->name}}</td>
                                        <td>{{$list->appointment_date}}</td>
                                        <td class="text-success text-center">@if($list->morning) █ @endif</td>
                                        <td class="text-success text-center">@if($list->afternoon) █ @endif</td>
                                        <td class="text-success text-center">@if($list->evening) █ @endif</td>
                                        <td><a href="{{route('appointment.destroy' , ['id'=>$list->id])}}">Delete</a>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-start">
                            <button class="btn btn-outline-info"><a href="{{route('pet.index')}}"> Home</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

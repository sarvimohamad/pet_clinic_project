@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row align-items-start">
                        <div class="col-6">
                            @if(session('massage'))
                                <div class="alert alert-success">{{session()->get('massage')}}</div>
                            @endif

                            @for($i =0; $i < 3; $i++)


                                <h3>{{\Carbon\Carbon::today()->addDays($i)->dayName}}</h3>
                                <form action="{{route('appointment.book', ['vet_id'=>$vet->id])}}" method="post">
                                    @csrf
                                    <div>

                                        <input type="hidden"
                                               value="{{\Carbon\Carbon::today()->addDays($i)->toDateString()}}"
                                               name="date">
                                        <label>Vet Time:</label>
                                        <select name="time">
                                            @if($vet->morning)
                                                <option value="morning">morning</option>@endif
                                            @if($vet->afternoon)
                                                <option value="afternoon">afternoon</option>@endif
                                            @if($vet->evening)
                                                <option value="evening">evening</option>@endif
                                        </select>
                                        <br>
                                        <label>your Pet:</label>
                                        <select name="pet">
                                            @foreach($pets as $pet)
                                                <option value="{{$pet->id}}">{{$pet->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <input class="btn-success" type="submit" name="" value="choise">
                                    </div>

                                </form>

                                <hr>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-start">
                            <button class="btn btn-outline-info"><a href="{{route('appointment.list')}}"> MY Appointment List</a></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </section>
@endsection


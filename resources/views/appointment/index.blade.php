@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            {{--            <div>{{$vet->id}}</div>--}}


            {{--            <input type="button" value="date">--}}
            {{--            <br>--}}
            {{--            <br>--}}
            {{--            <div>--}}
            {{--                <label for="morning">morning:</label>--}}
            {{--                <input type="checkbox" name=""  value=""--}}
            {{--                    {{old('name',$vet->morning)? 'checked' : ''}}--}}
            {{--                >--}}
            {{--            </div>--}}
            {{--            <div>--}}
            {{--                <label for="afternoon">afternoon:</label>--}}
            {{--                <input type="checkbox" name="" value="morning">--}}
            {{--            </div>--}}
            {{--            <div>--}}
            {{--                <label for="evening">evening:</label>--}}
            {{--                <input type="checkbox" name="" value="morning">--}}
            {{--            </div>--}}
            {{--            <br>--}}
            {{--            <div>--}}
            {{--                <label for="evening">is active:</label>--}}
            {{--                <input type="checkbox" name="" value="active">--}}
            {{--            </div>--}}
            {{--        </div>--}}

            @for($i =0; $i < 3; $i++)

                <h3>{{\Carbon\Carbon::today()->addDays($i)->dayName}}</h3>
                <form action="{{route('appointment.book', ['vet_id'=>$vet->id])}}" method="post">
                    @csrf
                    <div>

                        <input type="hidden" value="{{\Carbon\Carbon::today()->addDays($i)->toDateString()}}"
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


    </section>
@endsection


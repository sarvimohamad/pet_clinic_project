@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-start">
                {{--                @foreach($list as $vet)--}}
                {{--                    <h1>{{$vet->id}}</h1>--}}
                {{--                @endforeach--}}
                <form method="post" action="{{route('vet.store')}}">
                    @csrf
                    <div>
                        <label class="form-label" for="exampleCheck1">speciality</label>
                        <input type="text" class="form-control" id="exampleCheck1" name="speciality">
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="exampleCheck1">morning</label>
                        <input type="checkbox" class="form-check-label" id="exampleCheck1" name="morning">
                    </div>
                    <div>
                        <label class="form-label" for="exampleCheck1">afternoon</label>
                        <input type="checkbox" class="form-check-label" id="exampleCheck1" name="afternoon">
                    </div>
                    <div>
                        <label class="form-label" for="exampleCheck1">evening</label>
                        <input type="checkbox" class="form-check-label" id="exampleCheck1" name="evening">
                    </div>
                    <div>
                        <label class="form-label" for="exampleCheck1">email</label>
                        <input type="text" class="form-check-label" id="exampleCheck1" name="email">
                    </div>

                    <br>

                    <input type="submit" class="btn-success" value="submit">
                </form>
            </div>
        </div>

    </section>
@endsection


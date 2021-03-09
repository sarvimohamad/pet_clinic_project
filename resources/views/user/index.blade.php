@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row align-items-start">
                        <div class="col-6">
                            <h1>pet list</h1>

                            @if($deleted_pet)
                                <div>
                                    your pet is deleted.<a href="{{route('pet.undo' , ['id'=>$deleted_pet])}}">Undo</a>
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>type</th>
                                    <th>name</th>
                                    <th>age</th>
                                    <th>D e s c</th>

                                </tr>
                                </thead>

                                <tbody>


                                @foreach($pets as $pet)
                                    <tr>
                                        <td>{{$pet->category->name}}</td>
                                        <td>{{$pet->name}}</td>
                                        <td>{{$pet->age}}</td>
                                        <td>
                                            <a href="{{route('pet.destroy' ,['id'=>$pet->id])}}">delete</a>/
                                            <a href="{{route('pet.edit' ,['userId'=>$pet->user_id ,'petId'=>$pet->id])}}">update</a>
                                            {{--                                <span>--}}
                                            {{--                                <form method="get" action="{{route('pet.destroy' ,['id'=>$pet->id])}}">--}}
                                            {{--                                    <button class="btn-outline-danger"  onclick="return confirm('are you sure delete?')"> DeLete </button>--}}
                                            {{--                                </form>--}}
                                            {{--                                <form method="get" action="{{route('pet.edit' ,['id'=>$pet->id])}}">--}}
                                            {{--                                    <button class="btn-outline-success">upDate</button>--}}
                                            {{--                                </form>--}}
                                            {{--                                    </span>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <hr>

                    <h3>Add your PET</h3>
                    <div class="container">
                        <div class="row align-items-start">
                            <form method="post" action="{{route('pet.create')}}">
                                @csrf
                                <div>
                                    <label>type pet</label><br>
                                    <select class="form-select" name="category_pets_id"
                                            aria-label="Default select example">
                                        <option>choose your pet type</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <br>
                                <div>
                                    <label for="exampleInputname" class="form-label">name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
                                </div>
                                <div>
                                    <label class="form-label" for="exampleCheck1">age</label>
                                    <input type="text" class="form-control" id="exampleCheck1" name="age">
                                </div>
                                <br>

                                <input type="submit" class="btn-success" value="submit">
                            </form>


                        </div>
                        <br>
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <button class="btn btn-outline-primary" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home" type="button" role="tab"
                                        aria-controls="v-pills-home" aria-selected="true">Home
                                </button>
                                <button class="btn btn-outline-primary" id="v-pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-profile" type="button" role="tab"
                                        aria-controls="v-pills-profile" aria-selected="true"><a
                                        href="{{route('vet.index')}}">Vets</a></button>
                                <button class="btn btn-outline-primary" id="v-pills-messages-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-messages" type="button" role="tab"
                                        aria-controls="v-pills-messages" aria-selected="true">appointments
                                </button>
                                <button class="btn btn-outline-primary" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="v-pills-settings" aria-selected="true">Settings
                                </button>
                                <br>
                                <hr>

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
                                    @foreach($vets as $vet)
                                    <tr>
                                        <th><a href="{{route('appointment.index',['vet_id' => $vet->id])}}">{{$vet->user->name}}</a></th>
                                        <th>{{$vet->speciality}}</th>
                                        <th class="text-success text-center">@if($vet->morning) █ @endif</th>
                                        <th>@if($vet->afternoon) █ @endif</th>
                                        <th>@if($vet->evening) █ @endif</th>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                            <br>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection





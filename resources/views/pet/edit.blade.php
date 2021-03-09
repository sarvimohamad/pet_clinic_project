@extends('layouts.app')

@section('content')
    <section>
        <h3>EDIT YOUR PET</h3>
        <div class="container">
            <div class="row align-items-start">
                <form method="post" action="{{route('pet.update' , ['userId'=>$pet->user_id , 'petId'=>$pet->id])}}">
                    <input type="hidden" name="user_id" value="{{$pet->id}}">
{{--                    <input name="_method" type="hidden" value="PUT">--}}
                    @csrf
                    <div>
                        <lable for="category_pets_id">your type pet:</lable>
                       <select class="form-select" name="category_pets_id" aria-label="Default select example" required>
                           @foreach($categories as $category)
                               <option @if($category->id == $pet->category_pets_id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                    <div>
                        <br>
                        <label for="exampleInputname" class="form-label">name:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="name" value="{{old('name' ,$pet->name)}}">
                    </div>
                    <div>
                        <label class="form-label" for="exampleCheck1">age:</label>
                        <input type="text" class="form-control" id="exampleCheck1" name="age" value="{{old('age' , $pet->age)}}">
                    </div>

                    <br>

                    <input type="submit" class="btn-success" value="submit">
                </form>
            </div>
        </div>


    </section>
@endsection

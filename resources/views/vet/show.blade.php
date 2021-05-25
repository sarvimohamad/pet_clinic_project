@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-start">
                <tr>

                    <td>{{$row->id}}</td><br>
                    <td>{{$row->name}}</td>
                </tr>


            </div>
        </div>

    </section>
@endsection


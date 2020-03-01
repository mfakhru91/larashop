@extends('layouts.global')
@section('title') Create Category @endsection
@section('content')

    @if(session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif
    <div class="col-md-8">
        <form enctype="multipart/form-data" action="{{route('categories.store')}}" class="bg-white shadow-sm p-3" method="POST">

        @csrf

            <label for="">Category name</label><br>
            <input type="text" class="form-controller {{$errors->first('name')? "is-invalid" : ""}}" name="name" value="{{old('name')}}">
            <div class="invalid-feedback">
              {{$errors->first('name')}}
            </div>
            <br>

            <label for="">Category image</label>
            <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}" name="image">
            <div class="invalid-feedback">
              {{$errors->first('image')}}
            </div>
            <br>

            <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </div>

@endsection

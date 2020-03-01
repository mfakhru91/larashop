@extends('layouts.global')
@section('title')Edit Categories @endsection
@section('content')

    @if(session('status'))
    <div class="alert alert-success">
    {{session('status')}}
    </div>
    @endif

    <div class="col-md-8">
        <form action="{{ route('categories.update',[$category->id]) }}" class="bg-white shadow p-3" method="POST" enytype="multipart/form-data">
            @csrf

            <input type="hidden" value="PUT" name="_method">
            {{$category->name}}

            <label for="">Category Name</label><br>
            <input type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{$category->name}}" name="name">
            <div class="invalid-feedback">
              {{$errors->first('name')}}
            </div>
            <label for="">Category slug</label>
            <input type="text" class="form-control {{$errors->first('slug') ? "is-invalid" : ""}}" value="{{$category->slug}}" name="slug">
            <div class="invalid-feedback">
              {{$errors->first('slug')}}
            </div>
            <br><br>

            <label for="">Category image</label>
            @if($category->image)
                <span>Current Image</span><br>
                <img src="{{asset('storage/app/public/'.$category->image)}}" alt="" width="120px">
                <br><br>
            @endif
            <input type="file" class="form-control" name="image">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <br><br>

            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>

@endsection

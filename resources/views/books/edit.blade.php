@extends('layouts.global')
@section('title') Edit book @endsection
@section('content')
  @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <form class="p-3 shadow-sm bg-white" action="{{route('books.update', [$book->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="_method" value="PUT">

    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" value="{{$book->title}}" placeholder="Book title">
    <br>

    <label for="cover">Cove</label>
    <small class="text-muted">Current cover</small><br>
    @if($book->cover)
      <img src="{{asset('storage/app/public/'.$book->cover)}}" alt="" width="96">
    @endif
    <br><br>
    <input type="file" class="form-control" name="cover" >
    <small class="text-muted">Kosongkan jika tidak ingin menggubah cover</small>
    <br><br>
    <label for="slug">slug</label>
    <br>
    <input type="text" class="form-control" name="slug" value="{{$book->slug}}" placeholder="enter-a-slug">
    <br>

    <label for="description">Description</label>
    <textarea name="description" rows="8" cols="80" id="description" class="form-control">{{$book->description}}</textarea>

    <label for="categories">Categories</label>
    <select multiple class="form-control js-example-basic-multiple" name="categories[]" id="categories"></select>
    <br><br>

    <label for="stock">Stock</label>
    <input type="text" class="form-control" name="stock" value="{{$book->stock}}" id="stock" placeholder="Stock">
    <br>

    <label for="author">Author</label>
    <input placeholder="Author" type="text" name="author" id="author" value="{{$book->author}}" class="form-control">
    <br>

    <label for="publisher">Publisher</label>
    <input class="form-control" type="text" placeholder="Publisher" name="publisher" id="publisher" value="{{$book->publisher}}">
    <br>

    <label for="price">Price</label>
    <input type="text" class="form-control" name="price" value="{{$book->price}}" placeholder="Price" id="price">
    <br>

    <label for="">Status</label>
    <select class="form-control" id="status" name="status">
      <option {{$book->status == 'PUBLISH' ? 'selected' : ''}} value="PUBLISH">PUBLISH</option>
      <option {{$book->status == 'DRAFT' ? 'selected' : ''}}value="DRAFT">DRAFT</option>
    </select>
    <br>

    <button type="submit" class="btn btn-primary" value="PUBLISH">Update</button>


  </form>

@endsection

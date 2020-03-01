@extends('layouts.global')
@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('title') Create Book @endsection
@section('content')

  <div class="row">
    <div class="col-md-8">
      @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
      <form class="shadow-sm p-3 bg-white" enctype="multipart/form-data" action="{{route('books.store')}}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Book title" value="">
        <br>

        <label for="cover">Cover</label>
        <br>
        <input type="file" class="form-control" name="cover" >
        <br>

        <label for="description">Description</label>
        <textarea name="description" class="form-control" placeholder="Give a description about this book"></textarea>
        <br>

        <label for="stock">Stock</label>
        <input type="number" name="stock" class="form-control" value="0" min="0">
        <br>

        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" value="" id="author" placeholder="Book author">
        <br>

        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" class="form-control" id="publisher" value="Book publisher">
        <br>

        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" value="Book price" id="price">
        <br>

        <label for="tag_list">Tags:</label>
        <select name="categories[]" multiple id="categories" class="form-control js-example-basic-multiple"></select>
        <br>
        <br>
        <button type="submit" name="save_action" class="btn btn-primary" value="PUBLISH">Publish</button>
        <button type="submit" name="save_action" class="btn btn-secondary" value="DRAFT">Save as draft</button>


      </form>
    </div>
  </div>
</div>
@endsection

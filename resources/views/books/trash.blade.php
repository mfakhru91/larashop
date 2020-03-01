@extends ('layouts.global')
@section('title') Books list @endsection
@section('content')
@if(session('status'))
  <div class="alery alert-success">
    {{session('status')}}
  </div>
@endif
  <div class="row">
    <div class="col-md-6">
        <form class="" action="{{route('books.index')}}">
          <div class="input-group">
            <input type="text" name="keyword" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
            <div class="input-group-append">
              <input type="submit" value="Filter" class="btn btn-primary">
            </div>
          </div>
        </form>
    </div>
    <div class="col-md-6">
      <ul class="nav nav-pills card-header-pills">
        <li class="nav-item">
          <a class="nav-link {{Request::get('status') == NULL && Request::path() == 'books' ? 'active' : ''}}" href="{{route('books.index')}}">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::get('status') == 'publish' ? 'active' : '' }}" href="{{route('books.index', ['status' => 'publish'])}}">Publish</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::get('status') == 'draft' ? 'active': '' }}" href="{{route('books.index', ['status' => 'draft'])}}">Draft</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::path() == 'books/trash' ? 'active': ''}}" href="{{route('books.trash')}}">Trash</a>
        </li>
      </ul>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th><b>Cover</b></th>
            <th><b>Titel</b></th>
            <th><b>Author</b></th>
            <th><b>Status</b></th>
            <th><b>Categories</b></th>
            <th><b>Stock</b></th>
            <th><b>Price</b></th>
            <th><b>Action</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
            <tr>
              <td>
                @if($book->cover)
                  <img src="{{asset('storage/app/public/'.$book->cover)}}" alt="" width="96px">
                @endif
              </td>
              <td>{{$book->title}}</td>
              <td>{{$book->author}}</td>
              <td>
                @if($book->status == "DRAFT")
                  <span class="badge bg-dark text-white">{{$book->status}}</span>
                @else
                  <span class="badge badge-success">{{$book->status}}</span>
                @endif
              </td>
              <td>
                @foreach($book->categories as $category)
                  <li>{{$category->name}}</li>
                @endforeach
              </td>
              <td>{{$book->stock}}</td>
              <td>{{$book->stock}}</td>
              <td>
                <form class="d-inline" action="{{route('books.restore',$book->id)}}" method="post">
                  @csrf
                  <input type="submit" class="btn btn-success btn-sm" value="Restore">
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="10"> {{$books->appends(Request::all())->links()}}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

@endsection

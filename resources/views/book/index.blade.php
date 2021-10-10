@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-offset-1 col-md-10">
          <div class="panel">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col col-sm-3 col-xs-12">
                          <h4 class="ml-2 title">Books</h4>
                      </div>
                      <div class="col-sm-9 col-xs-12 text-right">
                      <div class="btn_group">
                      </div>
                      </div>
                  </div>
              </div>

              <div class="panel-body table-responsive mx-auto">
                  <table class="table" id="datatable">
                      <thead>
                          <tr class='booktr'>
                              <th>#</th>
                              <th>Title</th>
                              <th>ISBN</th>
                              <th>Price</th>
                              <th>Category</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            @foreach ($books as $key => $book)
                              <td>{{$key+1}}</td>
                              <td>{{$book->title}}</td>
                              <td>{{$book->isbn}}</td>
                              <td>{{$book->price}} €</td>
                              <td>{{$book->category}}</td>
                              <td>
                                <div class="list-block">
                                  <ul class="action-list list-block__buttons">
                                      <a href="{{route('book.edit',[$book])}}" class ="btn btn-secondary">Edit</a>
                                      <form method="POST" action="{{route('book.destroy', [$book])}}">
                                      <button type="submit" class="btn btn-danger ml-3">Delete</button>
                                      @csrf
                                      </form>
                                      </li>
                                  </ul>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endpush
@section('title') Books  @endsection

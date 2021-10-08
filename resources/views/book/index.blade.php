@extends('layouts.app')


@section('styled')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                        <form action="{{route('book.index')}}" method="get">
                          Filter by author name  
                          <select class="mx-2 form-control" name="author_id">
                            <option value="0" disabled selected>Select author</option>
                          @foreach ($authors as $author)
                              <option class="optfilter" value="{{$author->id}}" @if($author_id == $author->id) selected @endif>{{$author->name}} {{$author->address}}</option>
                          @endforeach
                          </select>
                            <button type="submit" class="btn btn-info" name="filter" value="author">Filter</button>
                            <a href="{{route('book.index')}}" class="ml-1 btn btn-warning">Reset</a>
                        </form>
                      </div>
                      </div>
                  </div>
              </div>

              <div class="panel-body table-responsive">
                  <table class="table" id="datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Surname</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Comment</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            @foreach ($books as $key => $book)
                              <td>{{$key+1}}</td>
                              <td>{{$book->name}}</td>
                              <td>{{$book->surname}}</td>
                              <td>{{$book->phone}}</td>
                              <td>{{$book->email}}</td>
                              <td><small>{!!$book->comment!!}<small></td>
                              <td>
                                <div class="list-block">
                                  <ul class="action-list list-block__buttons">
                                      <a href="{{route('book.edit',[$book])}}" class ="btn btn-edit">Edit</a>
                                      <form method="POST" action="{{route('book.destroy', [$book])}}">
                                      <button type="submit" class="btn btn-dang ml-3">Delete</button>
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
              <div class="panel-footer">
                <div class="row">
                    <div class="col col-sm-6 col-xs-6">Showing  out of entries</div>
                    <div class="col-sm-6 col-xs-6">
                        <ul class="pagination hidden-xs pull-right mr-4">
                            <li><a href="#"><</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">></a></li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('title') Books  @endsection

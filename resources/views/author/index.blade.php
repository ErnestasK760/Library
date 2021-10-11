@extends('layouts.app')

@section('styled')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
  <div class="row mx-auto row-center">
      <div class="col-md-offset-1 col-md-10">
          <div class="panel">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col col-sm-3 col-xs-12">
                          <h4 class="ml-2 title">Authors</h4>
                      </div>
                      <div class="col-sm-9 col-xs-12 text-right">
        
                      </div>
                  </div>
              </div>
              <div class="panel-body table-responsive">
                  <table class="table" id="datatable">
                      <thead>
                          <tr class="authortr">
                              <th>#</th>
                              <th>Name</th>
                              <th>Surname</th>
                              <th>Books published</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="my-auto">
                            @foreach ($authors as $key =>$author)
                              <td>{{$key+1}}</td>
                              <td>{{$author->name}}</td>
                              <td>{{$author->surname}}</td>
                              <td>
                                @if($author->authorBooks->count())
                                Has {{$author->authorBooks->count()}} books published
                                 @else
                                Author has no books published
                                 @endif
                              </td>
                              <td>
                                <div class="list-block">
                                    <form method="POST" action="{{route('author.destroy', $author)}}">
                                    <a href="{{route('author.edit',[$author])}}" class ="btn btn-warning">Edit</a>
                                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                                     @csrf
                                    </form>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <div class="panel-footer">
                  <div class="row">
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('title') Authors  @endsection
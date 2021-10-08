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
                          <h4 class="ml-2 title">Companies</h4>
                      </div>
                      <div class="col-sm-9 col-xs-12 text-right">
        
                      </div>
                  </div>
              </div>
              <div class="panel-body table-responsive">
                  <table class="table" id="datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Address</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            @foreach ($authors as $key =>$author)
                              <td>{{$key+1}}</td>
                              <td>{{$author->name}}</td>
                              <td>{{$author->surname}}</td>
                              <td>
                                <div class="list-block">
                                  <ul class="action-list list-block__buttons">
                                    <a href="{{route('author.edit',[$author])}}" class ="btn btn-edit">Edit</a>
                                    <form method="POST" action="{{route('author.destroy', $author)}}">
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
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('title') Companies  @endsection
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
                          <h4 class="ml-2 title">Customers</h4>
                      </div>
                      <div class="col-sm-9 col-xs-12 text-right">
                      <div class="btn_group">
                        <form action="{{route('customer.index')}}" method="get">
                          Filter by company name  
                          <select class="mx-2 form-control" name="company_id">
                            <option value="0" disabled selected>Select company</option>
                          @foreach ($companies as $company)
                              <option class="optfilter" value="{{$company->id}}" @if($company_id == $company->id) selected @endif>{{$company->name}} {{$company->address}}</option>
                          @endforeach
                          </select>
                            <button type="submit" class="btn btn-info" name="filter" value="company">Filter</button>
                            <a href="{{route('customer.index')}}" class="ml-1 btn btn-warning">Reset</a>
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
                            @foreach ($customers as $key => $customer)
                              <td>{{$key+1}}</td>
                              <td>{{$customer->name}}</td>
                              <td>{{$customer->surname}}</td>
                              <td>{{$customer->phone}}</td>
                              <td>{{$customer->email}}</td>
                              <td><small>{!!$customer->comment!!}<small></td>
                              <td>
                                <div class="list-block">
                                  <ul class="action-list list-block__buttons">
                                      <a href="{{route('customer.edit',[$customer])}}" class ="btn btn-edit">Edit</a>
                                      <form method="POST" action="{{route('customer.destroy', [$customer])}}">
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
                    <div class="col col-sm-6 col-xs-6">Showing {{$customers->count()}} out of {{$customers->total()}} entries</div>
                    <div class="col-sm-6 col-xs-6">
                        <ul class="pagination hidden-xs pull-right mr-4">
                            <li><a href="{{$customers->previousPageUrl()}}"><</a></li>
                            <li><a href="#">Page {{$customers->currentPage()}}</a></li>
                            <li><a href="{{$customers->nextPageUrl()}}">></a></li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('title') Customers  @endsection

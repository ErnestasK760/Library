@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h4>Create company</h4>
                </div>
                <div class="card-body">
                <form method="POST" action="{{route('company.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="company_name" value="{{old('company_name')}}">
                        <small class="form-text text-muted">Enter new company name.</small>
                      </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="company_address" value="{{old('company_address')}}">
                        <small class="form-text text-muted">Enter company's address.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add new</button>
                    @csrf
                </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') New company  @endsection
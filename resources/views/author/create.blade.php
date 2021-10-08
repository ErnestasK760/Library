@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h4>Create author</h4>
                </div>
                <div class="card-body">
                <form method="POST" action="{{route('author.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="author_name" value="{{old('author_name')}}">
                        <small class="form-text text-muted">Enter new author name.</small>
                      </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="author_address" value="{{old('author_address')}}">
                        <small class="form-text text-muted">Enter author's address.</small>
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

@section('title') New author  @endsection
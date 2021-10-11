@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center row-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h4>Edit author</h4></div>

               <div class="card-body">
                <form method="POST" action="{{route('author.update',$author)}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="author_name" value="{{old('author_name',$author->name)}}">
                        <small class="form-text text-muted">Enter new author name.</small>
                      </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="author_surname" value="{{old('author_surname',$author->surname)}}">
                        <small class="form-text text-muted">Enter new author address.</small>
                    </div>
                    <div class="list-block">
                        <div class="list-block__buttons">
                    <button type="submit" class="btn btn-primary">Update Author</button>
                         </div>
                    </div>
                    @csrf   
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Edit author  @endsection

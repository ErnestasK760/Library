@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h4>Create book</h4>
                </div>

               <div class="card-body">
                <form method="POST" action="{{route('book.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="book_name" value="{{old('book_name')}}">
                        <small class="form-text text-muted">Book's name.</small>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="book_surname" value="{{old('book_surname')}}">
                        <small class="form-text text-muted">Book's surname.</small>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="book_phone" value="{{old('book_phone')}}">
                        <small class="form-text text-muted">Book's phone number.</small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="book_email" value="{{old('book_email')}}">
                        <small class="form-text text-muted">Book's email address.</small>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" id="summernote" name="book_comment">{{old('book_comment')}}</textarea>
                        <small class="form-text text-muted">Info about the book.</small>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <select class="form-control" name="author_id">
                        @foreach ($authors as $author)
            
                            <option value="{{$author->id}}">{{$author->name}} {{$author->address}}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Select author from the list.</small>
                    </div>
                    @csrf
                    <button type="submit" class="btn btn-primary">Add new</button>
                 </form>
                
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
</script>
@endsection

@section('title') New book  @endsection
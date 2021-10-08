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
                        <label>Title</label>
                        <input type="text" class="form-control" name="book_title" value="{{old('book_title')}}">
                        <small class="form-text text-muted">Book's title.</small>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="book_price" value="{{old('book_price')}}">
                        <small class="form-text text-muted">Book's price.</small>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="book_category" value="{{old('book_category')}}">
                        <small class="form-text text-muted">Book's category.</small>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
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
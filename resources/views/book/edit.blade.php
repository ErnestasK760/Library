@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center row-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"><h4>Edit book<h4></div>

               <div class="card-body">
                <form method="POST" action="{{route('book.update',[$book])}}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="book_title" value="{{old('book_title',$book->title)}}">
                        <small class="form-text text-muted">Book's title.</small>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="book_price" value="{{old('book_price',$book->price)}}">
                        <small class="form-text text-muted">Book's price.</small>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="book_category">
                        @foreach ($categories as $category)
            
                            <option value="{{$category}}">{{$category}}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Select author from the list.</small>
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <select class="form-control" name="author_id">
                        @foreach ($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Select author from the list.</small>
                    </div>
                    <div class="list-block">
                        <div class="list-block__buttons">
                    <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </div>
                    @csrf
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

@section('title') Edit book  @endsection
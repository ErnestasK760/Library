@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                   <h4>Create customer</h4>
                </div>

               <div class="card-body">
                <form method="POST" action="{{route('customer.store')}}">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="customer_name" value="{{old('customer_name')}}">
                        <small class="form-text text-muted">Customer's name.</small>
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" name="customer_surname" value="{{old('customer_surname')}}">
                        <small class="form-text text-muted">Customer's surname.</small>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="customer_phone" value="{{old('customer_phone')}}">
                        <small class="form-text text-muted">Customer's phone number.</small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="customer_email" value="{{old('customer_email')}}">
                        <small class="form-text text-muted">Customer's email address.</small>
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea class="form-control" id="summernote" name="customer_comment">{{old('customer_comment')}}</textarea>
                        <small class="form-text text-muted">Info about the customer.</small>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <select class="form-control" name="company_id">
                        @foreach ($companies as $company)
            
                            <option value="{{$company->id}}">{{$company->name}} {{$company->address}}</option>
                        @endforeach
                        </select>
                        <small class="form-text text-muted">Select company from the list.</small>
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

@section('title') New customer  @endsection
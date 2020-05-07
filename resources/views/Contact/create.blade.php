@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('Contact.store') }}" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Full Name :</label>
                    <input type="text" name="fullName" class="form-control" value="{{ old('fullName') }}" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Mobile :</label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label>Phone :</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label>Address :</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" name="img" class="form-control" value="{{ old('img') }}" placeholder="Enter Image">
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <input type="text" name="desc" class="form-control" value="{{ old('desc') }}" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label class="my-1 mr-2" >Category</label>
                    <select name="category_id" class="custom-select my-1 mr-sm-2">
                        <option selected disabled>Choose...</option>
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>    
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
  
@endsection
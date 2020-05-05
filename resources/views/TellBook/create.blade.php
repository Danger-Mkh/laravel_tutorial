@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('TellBook.store') }}">
                @csrf
                 <div class="form-group">
                    <label>Full Name :</label>
                    <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Mobile :</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label>Phone :</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label>Address :</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>Slug :</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter Slug">
                </div>
                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" name="img" class="form-control" placeholder="Enter Image">
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <input type="text" name="desc" class="form-control" placeholder="Enter Description">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
  
@endsection
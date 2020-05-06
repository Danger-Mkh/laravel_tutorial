@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('Contact.update', ['Contact' => $Contact->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                 <div class="form-group">
                    <label>Full Name :</label>
                 <input type="text" name="fullName" class="form-control" value="{{ old('fullName', $Contact->fullName) }}" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $Contact->email) }}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Mobile :</label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $Contact->mobile) }}" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                    <label>Phone :</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $Contact->phone) }}" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label>Address :</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $Contact->address) }}" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label>Image :</label>
                    <input type="file" name="img" class="form-control" value="{{ old('img') }}" placeholder="Enter Image">
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <input type="text" name="desc" class="form-control" value="{{ old('desc', $Contact->desc) }}" placeholder="Enter Description">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
  
@endsection
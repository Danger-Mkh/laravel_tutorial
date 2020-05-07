@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('Category.store') }}" enctype="multipart/form-data">
                @csrf
                 <div class="form-group">
                    <label>Title :</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Description :</label>
                    <input type="text" name="desc" class="form-control" value="{{ old('desc') }}" placeholder="Enter Description">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
  
@endsection
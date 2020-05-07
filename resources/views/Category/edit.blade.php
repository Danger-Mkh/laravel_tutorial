@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{ route('Category.update', ['Category' => $Category->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                 <div class="form-group">
                    <label>Title :</label>
                 <input type="text" name="title" class="form-control" value="{{ old('title', $Category->title) }}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="email" name="desc" class="form-control" value="{{ old('desc', $Category->desc) }}" placeholder="Enter Description">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
  
@endsection
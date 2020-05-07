@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <a href="{{ route('Category.create') }}" class="btn btn-primary">Create Category</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Create Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Categorys as $Category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $Category->title }}</td>
                            <td>{{ $Category->desc }}</td>
                            <td>{{ $Category->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('Category.destroy', ['Category' => $Category->id] ) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                <a href="{{ route('Category.edit', ['Category' => $Category->id] )}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
  
@endsection
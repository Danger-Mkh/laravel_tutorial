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
            <a href="{{ route('TellBook.create') }}" class="btn btn-primary">Create Contact</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tellBooks as $tellbook)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $tellbook->fullName }}</td>
                            <td>{{ $tellbook->email }}</td>
                            <td>{{ $tellbook->mobile }}</td>
                            <td>{{ $tellbook->phone }}</td>
                            <td>{{ $tellbook->address }}</td>
                            <td>{{ $tellbook->slug }}</td>
                            <td>{{ $tellbook->desc }}</td>
                            <td>{{ $tellbook->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route('TellBook.destroy', ['TellBook' => $tellbook->id] ) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                <a href="{{ route('TellBook.edit', ['TellBook' => $tellbook->id] )}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
  
@endsection
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
            <a href="{{ route('Contact.create') }}" class="btn btn-primary">Create Contact</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Description</th>
                        <th scope="col">Created Time</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Contacts as $Contact)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $Contact->fullName }}</td>
                            <td>{{ $Contact->email }}</td>
                            <td>{{ $Contact->mobile }}</td>
                            <td>{{ $Contact->phone }}</td>
                            <td>{{ $Contact->address }}</td>
                            <td>{{ $Contact->desc }}</td>
                            <td>{{ $Contact->created_at->diffForHumans() }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $Contact->img) }}" style="max-width: 150px;">
                            </td>
                            <td>
                                <form action="{{ route('Contact.destroy', ['Contact' => $Contact->id] ) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                <a href="{{ route('Contact.edit', ['Contact' => $Contact->id] )}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</div>
  
@endsection
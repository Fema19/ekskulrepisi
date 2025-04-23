@extends('layouts.app')

@section('content')
<h1>Teachers</h1>
<a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">Add Teacher</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->position->title }}</td>
            <td>
                <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
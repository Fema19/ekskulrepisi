@extends('layouts.app')

@section('content')
<h1>Edit Teacher</h1>
<form action="{{ route('teachers.update', $teacher) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}" required>
    </div>
    <div class="mb-3">
        <label for="position_id" class="form-label">Position</label>
        <select name="position_id" id="position_id" class="form-select" required>
            @foreach ($positions as $position)
                <option value="{{ $position->id }}" {{ $teacher->position_id == $position->id ? 'selected' : '' }}>
                    {{ $position->title }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
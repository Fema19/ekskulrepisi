@extends('layouts.app')

@section('content')
<h1>Create Teacher</h1>
<form action="{{ route('teachers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="position_id" class="form-label">Position</label>
        <select name="position_id" id="position_id" class="form-select" required>
            @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->title }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
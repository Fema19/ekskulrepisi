<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Position;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('position')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $positions = Position::all();
        return view('teachers.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email', // Validation for new records
            'position_id' => 'required|exists:positions,id',
        ]);

        Teacher::create($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher created!');
    }

    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $positions = Position::all();
        return view('teachers.edit', compact('teacher', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id, // Validation for updates
            'position_id' => 'required|exists:positions,id',
        ]);

        $teacher->update($validated);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated!');
    }

    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Teacher deleted!');
    }
}

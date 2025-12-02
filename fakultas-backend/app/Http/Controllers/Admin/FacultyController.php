<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    // Get all faculties
    public function index()
    {
        return response()->json(Faculty::all());
    }

    // Create faculty
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $faculty = Faculty::create($request->all());

        return response()->json([
            'message' => 'Faculty created successfully',
            'data' => $faculty
        ]);
    }

    // Show specific faculty
    public function show($id)
    {
        return response()->json(Faculty::findOrFail($id));
    }

    // Update faculty
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->update($request->all());

        return response()->json([
            'message' => 'Faculty updated successfully',
            'data' => $faculty
        ]);
    }

    // Delete faculty
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return response()->json(['message' => 'Faculty deleted successfully']);
    }
}

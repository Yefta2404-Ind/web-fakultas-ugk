<?php

namespace App\Http\Controllers\FacultyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index($faculty_id)
    {
        return response()->json(
            Program::where('faculty_id', $faculty_id)->get()
        );
    }

    public function store(Request $request, $faculty_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $program = Program::create([
            'faculty_id' => $faculty_id,
            ...$request->all()
        ]);

        return response()->json($program);
    }

    public function show($id)
    {
        return response()->json(Program::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        $program->update($request->all());
        return response()->json($program);
    }

    public function destroy($id)
    {
        Program::destroy($id);
        return response()->json(['message' => 'Program deleted']);
    }
}

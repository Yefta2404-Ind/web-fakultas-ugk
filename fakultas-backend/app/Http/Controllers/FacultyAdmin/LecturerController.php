<?php

namespace App\Http\Controllers\FacultyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index($faculty_id)
    {
        return response()->json(
            Lecturer::where('faculty_id', $faculty_id)->get()
        );
    }

    public function store(Request $request, $faculty_id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'nullable',
            'photo' => 'nullable',
            'bio' => 'nullable',
        ]);

        $lecturer = Lecturer::create([
            'faculty_id' => $faculty_id,
            ...$request->all()
        ]);

        return response()->json($lecturer);
    }

    public function show($id)
    {
        return response()->json(Lecturer::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::findOrFail($id);
        $lecturer->update($request->all());
        return response()->json($lecturer);
    }

    public function destroy($id)
    {
        Lecturer::destroy($id);
        return response()->json(['message' => 'Lecturer deleted']);
    }
}

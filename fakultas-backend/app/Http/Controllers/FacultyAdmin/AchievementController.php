<?php

namespace App\Http\Controllers\FacultyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index($faculty_id)
    {
        return response()->json(
            Achievement::where('faculty_id', $faculty_id)->get()
        );
    }

    public function store(Request $request, $faculty_id)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'nullable',
            'description' => 'nullable',
        ]);

        $achievement = Achievement::create([
            'faculty_id' => $faculty_id,
            ...$request->all()
        ]);

        return response()->json($achievement);
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->update($request->all());
        return response()->json($achievement);
    }

    public function destroy($id)
    {
        Achievement::destroy($id);
        return response()->json(['message' => 'Achievement deleted']);
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacultySection;

class FacultySectionController extends Controller
{
    // GET all sections per fakultas
    public function index($faculty_id) {
        $sections = FacultySection::where('faculty_id', $faculty_id)->get();
        return response()->json($sections);
    }

    // GET single section by section_key
    public function show($faculty_id, $section_key) {
        $section = FacultySection::where([
            ['faculty_id', $faculty_id],
            ['section_key', $section_key]
        ])->first();

        if (!$section) return response()->json(['message'=>'Section not found'], 404);

        return response()->json($section);
    }

    // CREATE or UPDATE section (upsert)
    public function upsert(Request $request, $faculty_id, $section_key) {
        $section = FacultySection::updateOrCreate(
            [
                'faculty_id' => $faculty_id,
                'section_key' => $section_key
            ],
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image
            ]
        );

        return response()->json($section);
    }

    // DELETE section
    public function destroy($faculty_id, $section_key) {
        $section = FacultySection::where([
            ['faculty_id', $faculty_id],
            ['section_key', $section_key]
        ])->first();

        if (!$section) return response()->json(['message'=>'Section not found'], 404);

        $section->delete();

        return response()->json(['message'=>'Section deleted']);
    }
}

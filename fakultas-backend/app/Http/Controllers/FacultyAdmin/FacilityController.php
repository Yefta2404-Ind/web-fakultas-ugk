<?php

namespace App\Http\Controllers\FacultyAdmin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index($faculty_id)
    {
        return response()->json(
            Facility::where('faculty_id', $faculty_id)->get()
        );
    }

    public function store(Request $request, $faculty_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $facility = Facility::create([
            'faculty_id' => $faculty_id,
            ...$request->all()
        ]);

        return response()->json($facility);
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);
        $facility->update($request->all());
        return response()->json($facility);
    }

    public function destroy($id)
    {
        Facility::destroy($id);
        return response()->json(['message' => 'Facility deleted']);
    }
}

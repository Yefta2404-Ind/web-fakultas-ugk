<?php

namespace App\Http\Controllers\FacultyAdmin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index($faculty_id)
    {
        return response()->json(
            News::where('faculty_id', $faculty_id)
                ->orderBy('created_at', 'desc')
                ->get()
        );
    }

    public function store(Request $request, $faculty_id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'image' => 'nullable',
        ]);

        $news = News::create([
            'faculty_id' => $faculty_id,
            ...$request->all()
        ]);

        return response()->json($news);
    }

    public function show($id)
    {
        return response()->json(News::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return response()->json($news);
    }

    public function destroy($id)
    {
        News::destroy($id);
        return response()->json(['message' => 'News deleted']);
    }
}

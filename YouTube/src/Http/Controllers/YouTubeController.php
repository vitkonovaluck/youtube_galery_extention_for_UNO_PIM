<?php

namespace Extra\YouTube\Http\Controllers;

use Extra\YouTube\DataGrids\YouTubeDataGrid;
use Extra\YouTube\Models\YouTube;
use Illuminate\Http\Request;

class YouTubeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return app(YouTubeDataGrid::class)->toJson();
        }

        return view('youtube::index');
    }

    public function create()
    {
        return view('youtube::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url'  => 'required|url'
        ]);

        Youtube::create($request->only(['name', 'url']));

        return redirect()->route('admin.youtube.index')->with('success', trans('youtube::app.youtube.create-success'));
    }

    public function destroy($id)
    {
        Youtube::destroy($id);

        return response()->json([
            'message' => trans('youtube::app.youtube.delete-success')]);
//        return redirect()->route('admin.youtube.index')
    }

}

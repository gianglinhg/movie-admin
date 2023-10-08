<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Tags';
        $tags = Tag::all();
        if(request()->ajax()){
            return DataTables::of($tags)->make(true);
        }
        $data['tags'] = $tags;
        $data['modal_id'] = 'new_tag';
        return view('g-movie.classes.tag', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['name_md5'] = md5($data['name']);
        $res = createOrUpdate('tags', $data, Carbon::now());
        return response()->json([
            'status' => true,
            'res' => $res
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return response()->json($tag, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json([
            'status' => true,
            'message' => 'Đã xóa thành công',
        ], 200);
    }
}

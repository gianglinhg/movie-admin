<?php

namespace App\Http\Controllers\Classes;

use Carbon\Carbon;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Tags';
        if(request()->ajax()){
            $draw = request()->draw;
            $page_size = request()->length > 0 ? request()->length : 10;
            $tags = Tag::take($page_size);
            return DataTables::of($tags)->with(['draw' => $draw])->make(true);
        }
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
        try {
            DB::beginTransaction();
        
            $tag = Tag::find($id);
        
            if ($tag) {
                $tag->delete();
        
                DB::table('movie_tag')->where('tag_id', $id)->delete();
        
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Đã xóa thành công',
                ], 200);
            } else {
                throw new \Exception("Tag không tồn tại.");
            }
        
        } catch (\Exception $e) {
            DB::rollBack();
            Log::emergency("File:" . $e->getFile() . " Line:" . $e->getLine() . " Message:" . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 201);
        }
    }
}

<?php

namespace App\Http\Controllers\Classes;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Diễn viên';
        if(request()->ajax()){
            $draw = request()->draw;
            $page_size = request()->length > 0 ? request()->length : 10;
            $actors = Actor::take($page_size);
            return DataTables::of($actors)->with(['draw' => $draw])->make(true);
        }
        $data['modal_id'] = 'new_actor';
        return view('g-movie.classes.actor', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['name_md5'] = md5($data['name']);
        $res = createOrUpdate('actors', $data, Carbon::now());
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
        $actor = Actor::find($id);
        return response()->json($actor, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
        
            $actor = Actor::find($id);
        
            if ($actor) {
                $actor->delete();
        
                DB::table('actor_movie')->where('actor_id', $id)->delete();
        
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Đã xóa thành công',
                ], 200);
            } else {
                throw new \Exception("Actor không tồn tại.");
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

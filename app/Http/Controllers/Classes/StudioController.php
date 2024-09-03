<?php

namespace App\Http\Controllers\Classes;

use Carbon\Carbon;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Studios';
        $studios = Studio::all();
        if(request()->ajax()){
            return DataTables::of($studios)->make(true);
        }
        $data['studios'] = $studios;
        $data['modal_id'] = 'new_studio';
        return view('g-movie.classes.studio', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['name_md5'] = md5($data['name']);
        $res = createOrUpdate('studios', $data, Carbon::now());
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
        $studio = Studio::find($id);
        return response()->json($studio, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
        
            $studio = Studio::find($id);
        
            if ($studio) {
                $studio->delete();
        
                DB::table('movie_studio')->where('studio_id', $id)->delete();
        
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Đã xóa thành công',
                ], 200);
            } else {
                throw new \Exception("Studio không tồn tại.");
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
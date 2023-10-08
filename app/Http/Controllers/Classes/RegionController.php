<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Khu vực';
        $regions = Region::all();
        if(request()->ajax()){
            return DataTables::of($regions)->make(true);
        }
        $data['regions'] = $regions;
        $data['modal_id'] = 'new_region';
        return view('g-movie.classes.region', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $res = createOrUpdate('regions', $data, Carbon::now());
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
        $region = Region::find($id);
        return response()->json($region, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);
        $region->delete();
        return response()->json([
            'status' => true,
            'message' => 'Đã xóa thành công',
        ], 200);
    }
}

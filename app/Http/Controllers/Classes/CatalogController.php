<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Danh sách';
        $catalogs = Catalog::all();
        if(request()->ajax()){
            return DataTables::of($catalogs)->make(true);
        }
        $data['catalogs'] = $catalogs;
        $data['modal_id'] = 'new_catalog';
        return view('g-movie.classes.catalog', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $res = createOrUpdate('catalogs', $data, Carbon::now());
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
        $catalog = Catalog::find($id);
        return response()->json($catalog, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalog = Catalog::find($id);
        $catalog->delete();
        return response()->json([
            'status' => true,
            'message' => 'Đã xóa thành công',
        ], 200);
    }
}
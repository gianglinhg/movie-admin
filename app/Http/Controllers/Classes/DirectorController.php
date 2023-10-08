<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Director;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Đạo diễn';
        $directors = Director::all();
        if(request()->ajax()){
            return DataTables::of($directors)->make(true);
        }
        $data['directors'] = $directors;
        $data['modal_id'] = 'new_director';
        return view('g-movie.classes.director', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['name_md5'] = md5($data['name']);
        $res = createOrUpdate('directors', $data, Carbon::now());
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
        $director = Director::find($id);
        return response()->json($director, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $director = Director::find($id);
        $director->delete();
        return response()->json([
            'status' => true,
            'message' => 'Đã xóa thành công',
        ], 200);
    }
}

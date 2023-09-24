<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = [];
        $data['title'] = 'Thể loại';
        $categories = Category::all();
        if(request()->ajax()){
            return DataTables::of($categories)->make(true);
        }
        $data['categories'] = $categories;
        $data['modal_id'] = 'new_category';
        return view('g-movie.categories.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $res = createOrUpdate('categories', $data, Carbon::now());
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
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Đã xóa thành công',
        ], 200);
    }
}

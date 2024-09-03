<?php

namespace App\Http\Controllers\Classes;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

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
        return view('g-movie.classes.category', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
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
        $id = 0;
        try {
            DB::beginTransaction();
        
            $actor = Category::find($id);
        
            if ($actor) {
                $actor->delete();
        
                DB::table('category_movie')->where('category_id', $id)->delete();
        
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Đã xóa thành công',
                ], 200);
            } else {
                throw new \Exception("Category không tồn tại");
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

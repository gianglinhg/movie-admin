<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['title'] = 'Danh sách phim';
        $data['route_new'] = route("movies.create");
        $movies = Movie::query()
        ->join('users','users.id','=','movies.user_id')
        ->select('movies.*','users.name as user_name')
        ->get();
        if(request()->ajax()){
            return Datatables::of($movies)
            ->addColumn('user_name', function ($row) {
                return $row->user_name;
            })
            ->editColumn('name', function($row){
                $statusText = '';
                switch ($row->status) {
                    case 'completed':
                        $statusText = 'Hoàn thành';
                        break;
                    case 'trailer':
                        $statusText = 'Sắp chiếu';
                        break;
                    case 'ongoing':
                        $statusText = 'Đang chiếu';
                        break;
                }
                return "
                    <h4>$row->name</h4>
                    <p>$row->origin_name</p>
                    <div style='display: flex; gap: 5px'>
                        <button type='button' class='btn btn-inverse-success btn-sm'>" . ($row->type == 'single' ? 'Phim lẻ' : 'Phim bộ') ."</button>
                        <button type='button' class='btn btn-inverse-secondary btn-sm'>$statusText</button>
                    </div>
                ";
            })
            ->addColumn('cate_name', function($row){
                return $row->categories->pluck('name')->implode(', ');
            })
            ->addColumn('region_name', function($row){
                return $row->regions->pluck('name')->implode(', ');
            })
            ->toJson();
        }
        $data['movies'] = $movies;
        return view('g-movie.movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        $data['categories'] = DB::table('categories')->get();
        $data['regions'] = DB::table('regions')->get();
        $data['title'] = 'Thêm mới phim';
        return view('g-movie.movies.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'origin_name' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

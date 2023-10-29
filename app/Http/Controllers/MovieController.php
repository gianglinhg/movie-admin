<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Episode;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use DB;
use Auth;

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
            ->join('users', 'users.id', '=', 'movies.user_id')
            ->select('movies.*', 'users.name as user_name')
            ->get();
        if (request()->ajax()) {
            return Datatables::of($movies)
                ->addColumn('user_name', function ($row) {
                    return $row->user_name;
                })
                ->editColumn('name', function ($row) {
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
                        <button type='button' class='btn btn-inverse-success btn-sm'>" . ($row->type == 'single' ? 'Phim lẻ' : 'Phim bộ') . "</button>
                        <button type='button' class='btn btn-inverse-secondary btn-sm'>$statusText</button>
                    </div>
                ";
                })
                ->addColumn('cate_name', function ($row) {
                    return $row->categories->pluck('name')->implode(', ');
                })
                ->addColumn('region_name', function ($row) {
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
        $data['route_list'] = route('movies.index');
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
        $movie = Movie::create([
            'name' => $request->name,
            'origin_name' => $request->origin_name,
            'slug' => $request->slug,
            'content' => $request->content,
            'type' => $request->type,
            'status' => $request->status,
            'trailer_url' => $request->trailer_url,
            'publish_year' => $request->publish_year,
            'quality' => $request->quality,
            'language' => $request->language,
            'episode_time' => $request->episode_time,
            'episode_total' => $request->episode_total,
            'episode_current' => $request->episode_current,
            'is_shown_in_theater' => $request->is_shown_in_theater ?? 0,
            'is_recommended' => $request->is_recommended ?? 0,
            'is_copyright' => $request->is_copyright ?? 0,
            'is_sensitive_content' => $request->is_sensitive_content ?? 0,
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
        ]);
        if ($movie) {
            $movie->addEpisode($data['episodes'], $movie->id);
            if (isset($data['categories'])) {
                foreach ($data['categories'] as $category) {
                    DB::table('category_movie')->insert([
                        'movie_id' => $movie->id,
                        'category_id' => $category,
                    ]);
                }
            }
            if (isset($data['categories'])) {
                foreach ($data['regions'] as $region) {
                    DB::table('movie_region')->insert([
                        'movie_id' => $movie->id,
                        'region_id' => $region,
                    ]);
                }
            }
            if (isset($data['categories'])) {
                foreach ($data['directors'] as $director) {
                    DB::table('director_movie')->insert([
                        'movie_id' => $movie->id,
                        'director_id' => $director,
                    ]);
                }
            }
            if (isset($data['categories'])) {
                foreach ($data['actors'] as $actor) {
                    DB::table('actor_movie')->insert([
                        'movie_id' => $movie->id,
                        'actor_id' => $actor,
                    ]);
                }
            }
            if (isset($data['categories'])) {
                foreach ($data['tags'] as $tag) {
                    DB::table('movie_tag')->insert([
                        'movie_id' => $movie->id,
                        'tag_id' => $tag,
                    ]);
                }
            }
        }
        toastr('Tạo phim mới thành công', 'success');
        return redirect()->route('movies.index');

        // echo '<pre>';print_r(json_encode($data));echo '</pre>';die();
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

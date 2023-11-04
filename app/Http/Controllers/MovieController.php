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
            'thumb_url' => asset_save($request->thumb_url),
            'poster_url' => asset_save($request->poster_url),
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
            if (isset($data['episodes']) && !empty($data['episodes'])) {
                foreach ($data['episodes'] as $episode) {
                    $movie->addEpisode($episode, $movie->id);
                }
            }
            if (isset($data['categories']) && !empty($data['categories'])) {
                addSub('category_movie',$data['categories'], $movie->id, 'category_id');
            }
            if (isset($data['regions']) && !empty($data['regions'])) {
                addSub('movie_region',$data['regions'], $movie->id, 'region_id');
            }
            if (isset($data['directors']) && !empty($data['directors'])) {
                addSub('director_movie',$data['directors'], $movie->id, 'director_id');
            }
            if (isset($data['actors']) && !empty($data['actors'])) {
                addSub('actor_movie',$data['actors'], $movie->id, 'actor_id');
            }
            if (isset($data['tags']) && !empty($data['tags'])) {
                addSub('movie_tag',$data['tags'], $movie->id, 'tag_id');
            }
        }
        toastr('Tạo phim mới thành công', 'success');
        return redirect()->route('movies.index');
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
        $movie = Movie::findOrFail($id);
        $data = [];
        $directors = $actors = $tags = [];
        foreach ($movie->directors as $director) {
            $directors[$director->id] = $director->name;
        }
        foreach ($movie->actors as $actor) {
            $actors[$actor->id] = $actor->name;
        }
        foreach ($movie->tags as $tag) {
            $tags[$tag->id] = $tag->name;
        }
        $data['route_list'] = route('movies.index');
        $data['categories'] = DB::table('categories')->get();
        $data['regions'] = DB::table('regions')->get();
        $data['movie_categories'] = $movie->categories->pluck('id')->toArray();
        $data['movie_regions'] = $movie->regions->pluck('id')->toArray();
        $data['movie_directors'] = $movie->directors->pluck('name')->toArray();
        $data['title'] = 'Sửa ' . $movie->name;
        $data['tags'] = $tags;
        $data['actors'] = $actors;
        $data['directors'] = $directors;
        $data['movie'] = $movie;
        $episodes = Episode::where('movie_id', $movie->id)->get()->toArray();
        $episodes_serve = $server = [];
        foreach ($episodes as $item) {
            $server_name = $item['server'];
            if(!in_array($server_name, $server)){
                $server[] = $server_name;
            }
            if (!array_key_exists($server_name, $episodes_serve)) {
                $episodes_serve[$server_name] = [];
            }
            $episodes_serve[$server_name][] = $item;
        }
        $data['episodes_serve'] = $episodes_serve;
        $data['server'] = $server;
        return view('g-movie.movies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'origin_name' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $data = $request->all();

        $movie->update([
            'name' => $request->name,
            'origin_name' => $request->origin_name,
            'slug' => $request->slug,
            'content' => $request->content,
            'type' => $request->type,
            'status' => $request->status,
            'trailer_url' => $request->trailer_url,
            'thumb_url' => asset_save($request->thumb_url),
            'poster_url' => asset_save($request->poster_url),
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
            if (isset($data['episodes']) && !empty($data['episodes'])) {
                $this->handle_episodes($data['episodes'], $movie->id);
            }
            if (isset($data['categories']) && !empty($data['categories'])) {
                deleteSub('category_movie',$movie->id);
                addSub('category_movie',$data['categories'], $movie->id, 'category_id');
            }
            if (isset($data['regions']) && !empty($data['regions'])) {
                deleteSub('movie_region',$movie->id);
                addSub('movie_region',$data['regions'], $movie->id, 'region_id');
            }
            if (isset($data['directors']) && !empty($data['directors'])) {
                deleteSub('director_movie',$movie->id);
                addSub('director_movie',$data['directors'], $movie->id, 'director_id');
            }
            if (isset($data['actors']) && !empty($data['actors'])) {
                deleteSub('actor_movie',$movie->id);
                addSub('actor_movie',$data['actors'], $movie->id, 'actor_id');
            }
            if (isset($data['tags']) && !empty($data['tags'])) {
                deleteSub('movie_tag',$movie->id);
                addSub('movie_tag',$data['tags'], $movie->id, 'tag_id');
            }
        }
        toastr('Cập nhật phim mới thành công', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if($movie){
            if (checkSub('episodes',$movie->id)) {
                deleteSub('episodes',$movie->id);
            }
            if (checkSub('category_movie',$movie->id)) {
                deleteSub('category_movie', $movie->id);
            }
            if (checkSub('movie_region',$movie->id)) {
                deleteSub('movie_region',$movie->id);
            }
            if (checkSub('director_movie', $movie->id)) {
                deleteSub('director_movie', $movie->id);
            }
            if (checkSub('actor_movie', $movie->id)) {
                deleteSub('actor_movie', $movie->id);
            }
            if (checkSub('movie_tag', $movie->id)) {
                deleteSub('movie_tag', $movie->id);
            }
            $movie->delete();
            $status = true;
        }else{
            $status = false;
        }
        return response()->json([
            'status'=> $status,
            'msg'=> 'Đã xóa thành công',
        ],200);
    }
}

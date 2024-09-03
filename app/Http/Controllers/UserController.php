<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;

class UserController extends Controller
{
    private $menu_title;
    public function __construct(){
        $this->menu_title = 'Authicention';
    }
    public function index(){
        $data = [];
        $data['title'] = 'User';
        $data['menu_title'] = $this->menu_title;
        $users = User::all();
        if(request()->ajax()){
            return DataTables::of($users)->make(true);
        }
        $data['users'] = $users;
        return view('g-movie.users.index', $data);
    }

}

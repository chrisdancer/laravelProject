<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $bookedShows = DB::table('bookedShows')->where('user_id', '=', Auth::id())->get();
        $shows = DB::table('shows')
            ->join('users','users.id',"=","users.id")
            ->join('bookedShows', function($join){
                $join->on('bookedShows.user_id','=','users.id')
                    ->on('bookedShows.show_id','=','shows.id');
            })
            ->select('shows.*')
            ->where('user_id', '=', Auth::id())
            ->get();
        return view('home')->with(['shows'=>$shows]);
    }
}

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
        $userID = Auth::id();
        $shows = DB::table('shows')
            ->join('users','users.id',"=","users.id")
            ->join('bookedShows', function($join){
                $join->on('bookedShows.user_id','=','users.id')
                    ->on('bookedShows.show_id','=','shows.id');
            })
            ->select('shows.*')
            ->where('user_id', '=', $userID)
            ->get();

        $carpools = DB::table('carpools')
            ->join('users','users.id',"=","users.id")
            ->join('bookedCarpools', function($join){
                $join->on('bookedCarpools.user_id','=','users.id')
                    ->on('bookedCarpools.carpool_id','=','carpools.id');
            })
            ->select('carpools.*')
            ->where('bookedCarpools.user_id', '=', $userID)
            ->get();
        return view('home')->with(['shows'=>$shows, 'carpools'=>$carpools]);
    }
}

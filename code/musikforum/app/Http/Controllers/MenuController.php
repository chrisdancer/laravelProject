<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function showView($currentPage) {
        if (! $currentPage) {
            abort(404, 'Sorry, that page is not available.');
        } else {
            $currentPageData = DB::table($currentPage)->get();
            return view('layouts.'.$currentPage, ['currentPageData' => $currentPageData, 'user_id' => Auth::user()->id, 'user_name' => Auth::user()->name]);
        }
    }
}

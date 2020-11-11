<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function showView($currentPage) {
        $currentPageData = DB::table($currentPage)->get();
        return view('layouts.'.$currentPage, ['currentPageData' => $currentPageData]);
    }
}

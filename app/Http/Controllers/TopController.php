<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;

class TopController extends Controller
{
    public function index(Request $request) {

        if(Auth::user()) {
            return view('ac.top.index_login');
        } else {
            return view('ac.top.index');
        }
    }

}

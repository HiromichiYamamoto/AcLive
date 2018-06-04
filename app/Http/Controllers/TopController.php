<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class TopController extends Controller
{
    public function index() {
        if(Auth::user()) {
            return view('ac.top.index_login');
        } else {
            return view('ac.top.index');
        }
    }
}

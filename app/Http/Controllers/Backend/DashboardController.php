<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){

        return view('backend.dashboard');
    }

    public function buy_token(){

        return view('backend.buy_token');
    }
}

<?php

namespace App\Http\Controllers\Forntend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForntendUSerController extends Controller
{
    public function index(){
        return view('forntend.dashboard.index');
    }
}

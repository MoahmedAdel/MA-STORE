<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Actions
    // return response : view , josn , redirect , file
    public function index(){
        return view('admin.index');
    }
}

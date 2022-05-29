<?php

namespace App\Http\Controllers\admin;

use function view;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}

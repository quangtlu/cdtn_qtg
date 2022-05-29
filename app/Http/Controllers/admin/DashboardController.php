<?php

namespace App\Http\Controllers\Admin;

use function view;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}

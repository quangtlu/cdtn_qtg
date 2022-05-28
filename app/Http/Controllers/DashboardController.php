<?php

namespace App\Http\Controllers;

use function view;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}

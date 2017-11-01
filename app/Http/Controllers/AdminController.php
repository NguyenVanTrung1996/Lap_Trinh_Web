<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }
    public function admin2()
    {
        return view('admin.index2');
    }

    public function widget()
    {
        return view('admin.pages.widgets');
    }

    public function top()
    {
        return view('admin.pages.layout.top-nav');
    }
    //
}

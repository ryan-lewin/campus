<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function recent()
    {
        return view('general.recent');
    }

    public function users()
    {
        return view('general.users');
    }
}

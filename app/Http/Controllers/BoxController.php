<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function create()
    {
        return view('boxes.create');
    }
}

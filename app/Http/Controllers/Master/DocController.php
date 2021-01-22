<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocController extends Controller
{
    public function index()
    {
        return view('services.Documentation.index');
    }
}

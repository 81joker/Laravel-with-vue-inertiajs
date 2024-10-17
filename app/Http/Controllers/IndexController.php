<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Index/Index');
    }
    public function show()
    {
        return Inertia::render('Index/Show');
    }
}

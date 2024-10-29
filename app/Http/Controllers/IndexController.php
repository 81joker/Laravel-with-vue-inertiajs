<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
                // dd(vars: Auth::check());

        return Inertia::render('Index/Index',['message' => 'Hello from Laravel!']);
    }
    public function show()
    {
        return Inertia::render('Index/Show');
    }
}

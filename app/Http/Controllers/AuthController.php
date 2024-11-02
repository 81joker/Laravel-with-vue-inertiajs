<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Auth/Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // https://laravel.com/docs/11.x/authentication
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            // https://annissimo.com/how-to-throw-validationexception-in-laravel-without-request-validation-helpers-or-manually-creating-a-validator
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }

        // To recreate the current session ID for the user after logging in,
        //  it creates a new session ID and deletes the old one.
        $request->session()->regenerate();

        // redirect()->intended() هي دالة في  تُستخدم لإعادة توجيه المستخدمين إلى الصفحة التي كانوا ينوون الوصول إليها قبل أن يتم تحويلهم، عادةً إلى صفحة تسجيل الدخول.
        // Note: If there is no page specified,
        //  the function will redirect the user to a default path specified within the code as a fallback option.

        return redirect()->intended('/listing');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('listing.index');

    }
}

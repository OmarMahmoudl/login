<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Show the administrator page.
     *
     * @return string
     */
    public function index()
    {
        return 'You are an administrator because you are seeing this page';
    }
}

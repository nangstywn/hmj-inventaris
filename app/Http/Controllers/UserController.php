<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        if (request()->user()->hasRole('user')) {
            return view('user');
        } else {
            return redirect('/');
        } 
    }
}
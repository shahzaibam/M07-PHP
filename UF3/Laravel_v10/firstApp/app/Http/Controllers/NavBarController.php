<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavBarController extends Controller
{
    public function welcomedaw2() {
        return view('navbar.welcomedaw2');
    }


    public function contact() {
        return view('navbar.contact');
    }


    public function blog() {
        return view('navbar.blog');
    }


    public function about() {
        return view('navbar.about');
    }

}

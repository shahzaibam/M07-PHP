<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index() {
        return view('navbar.index');
    }

    public function events() {
        return view('navbar.events');
    }

    public function aboutus() {
        return view('navbar.aboutus');
    }

    public function contact() {
        return view('navbar.contact');
    }

}

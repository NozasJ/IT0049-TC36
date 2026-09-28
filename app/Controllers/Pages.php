<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('header').view('index').view('footer');
    }

    public function about()
    {
        return view('header'). view('about'). view('footer');
    }
}
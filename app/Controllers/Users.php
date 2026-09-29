<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        
        $data = [
            'users' => $model->findAll()
        ];

        return view('header').view('users', $data).view('footer');
    }
}
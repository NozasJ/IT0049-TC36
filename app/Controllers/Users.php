<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice.j@example.com', 'role' => 'Admin'],
            ['id' => 2, 'name' => 'Bob Smith', 'email' => 'bob.smith@example.com', 'role' => 'Staff'],
            ['id' => 3, 'name' => 'Clara Oswald', 'email' => 'clara.o@example.com', 'role' => 'Customer'],
            ['id' => 4, 'name' => 'David Miller', 'email' => 'david.m@example.com', 'role' => 'Manager'],
            ['id' => 5, 'name' => 'Elena Rostova', 'email' => 'elena.r@example.com', 'role' => 'Customer'],
        ];        
        return view('header').view('users', $data).view('footer');
    }
   
}
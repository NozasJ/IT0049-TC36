<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            ['id' => 1, 'name' => 'Ana Cruz', 'company' => 'Cruz Enterprises', 'email' => 'ana.cruz@gmail.com', 'contact' => '09181112233', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Marco Dizon', 'company' => 'Dizon Trading', 'email' => 'marco.dizon@yahoo.com', 'contact' => '09274445566', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Sarah Jenkins', 'company' => 'Jenkins Retail', 'email' => 'sarah.j@outlook.com', 'contact' => '09357778899', 'status' => 'Inactive'],
            ['id' => 4, 'name' => 'Kenji Sato', 'company' => 'Sato Tech Solutions', 'email' => 'kenji.sato@gmail.com', 'contact' => '09460001122', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Bea Gomez', 'company' => 'Gomez Logistics', 'email' => 'bea.gomez@gmail.com', 'contact' => '09583334455', 'status' => 'Pending'],
        ];
        return view('header').view('customers', $data).view('footer');
    }
   
}
<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();
        
        $data = [
            'customers' => $model->findAll()
        ];
        return view('header').view('customers', $data).view('footer');
    }

    public function new()
    {
        return view('header') . view('customers/new') . view('footer');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'regex_match[/^\+?[0-9\s\-]{7,15}$/]|permit_empty'
        ];
        if (!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());;
        }
        $model = new CustomerModel();
        $model->insert([
            'full_name'=>$this->request->getPost('full_name'),
            'email'=>$this->request->getPost('email'),
            'phone'=>$this->request->getPost('phone')
        ]);
        return redirect()->to('/customers')->with('success', 'Customer created successfully!');
    }

    public function edit($id = null)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if (!$customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Customer #{$id} not found.");
        }

        $data = [
            'customer' => $customer
        ];

        return view('header') . view('customers/edit', $data) . view('footer');
    }
    
    public function update($id = null)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'regex_match[/^\+?[0-9\s\-]{7,15}$/]|permit_empty'
        ];

        if (!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();
        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully!');
    }
}
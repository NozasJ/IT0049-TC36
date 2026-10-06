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

    public function new()
    {
        return view('header') . view('users/new') . view('footer');
    }

    public function create()
{
    $rules = [
        'username' => 'required|is_unique[users.username]',
        'full_name' => 'required'
    ];
    $file = $this->request->getFile('avatar');

    // Validate whenever a file was actually submitted, even if the upload failed
    if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
        $rules['avatar'] = [
            'rules' => [
                'uploaded[avatar]',
                'max_size[avatar,2048]',
                'mime_in[avatar,image/jpeg,image/png]',
                'ext_in[avatar,jpg,jpeg,png]',
                'is_image[avatar]',
            ],
        ];
    }

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $model = new UserModel();

    if ($file && $file->isValid() && ! $file->hasMoved()) {
        $newName = $file->getRandomName();
        $uploadPath = FCPATH . 'uploads';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $file->move($uploadPath, $newName);

        $image = service('image');
        $image->withFile(FCPATH . 'uploads/' . $newName)
            ->fit(300, 300, 'center')
            ->save(FCPATH . 'uploads/' . $newName);

        $model->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'avatar' => $newName
        ]);
    } else {
        $model->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ]);
    }

    return redirect()->to('/users')->with('success', 'User created successfully!');
}

    public function edit($id = null)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User #{$id} not found.");
        }

        $data = [
            'user' => $user
        ];

        return view('header') . view('users/edit', $data) . view('footer');
    }
    
    public function update($id = null){   
    $model = new UserModel();

    if (! $model->find($id)) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("User #{$id} not found.");
    }

    $rules = [
        'username' => "required|is_unique[users.username,id,{$id}]",
        'full_name' => 'required'
    ];
    $username = $this->request->getPost('username');
    $full_name = $this->request->getPost('full_name');
    $file = $this->request->getFile('avatar');

    if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
        $rules['avatar'] = [
            'rules' => [
                'uploaded[avatar]',
                'max_size[avatar,2048]',
                'mime_in[avatar,image/jpeg,image/png]',
                'ext_in[avatar,jpg,jpeg,png]',
                'is_image[avatar]',
            ],
        ];
    }

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }   

    if ($file && $file->isValid() && ! $file->hasMoved()) {
        $newName = $file->getRandomName();
        $uploadPath = FCPATH . 'uploads';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $file->move($uploadPath, $newName);

        $image = service('image');
        $image->withFile(FCPATH . 'uploads/' . $newName)
            ->fit(300, 300, 'center')
            ->save(FCPATH . 'uploads/' . $newName);

        $oldAvatar = $model->find($id)['avatar'] ?? null;
        if (! empty($oldAvatar)) {
            @unlink($uploadPath . '/' . basename($oldAvatar));
        }

        $model->update($id, [
            'username' => $username,
            'full_name' => $full_name,
            'avatar' => $newName
        ]);
    } else {
        $model->update($id, [
            'username' => $username,
            'full_name' => $full_name
        ]);
    }

    return redirect()->to('/users')->with('success', 'User updated successfully!');
    }
}
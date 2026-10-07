<?php
namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('header.php').view('auth/login').view('footer.php');
    }

    public function attemptLogin()
    {
        $model    = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Invalid login.');
            return redirect()->back()->withInput();
        }

        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'username'   => $user['username'],
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
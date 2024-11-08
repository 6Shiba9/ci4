<?php

namespace Modules\Login\Controllers;

use CodeIgniter\Controller;
use Modules\login\Models\login_model;

class login extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('Modules\Login\Views\login');
    }

    public function auth()
    {
        $request = \Config\Services::request();
        $session = session();
        $model = new login_model();
        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $data = $model->where('user_email', $email)->first();
        if ($data) {
            $pass = $data['user_password'];
            $verify_password = password_verify($password, $pass);
            if ($verify_password) {
                $ses_data = [
                    'user_id' => $data['user_id'],
                    'user_name' => $data['user_name'],
                    'user_email' => $data['user_email'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Manage/namelist');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login')->withInput();
            }
        } else {
            $session->setFlashdata('msg', 'Email not found');
            return redirect()->to('login')->withInput();
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('page/login');
    }
}
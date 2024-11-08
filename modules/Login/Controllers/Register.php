<?php namespace Modules\login\Controllers;

use CodeIgniter\Controller;
use Modules\login\Models\login_model;

class Register extends Controller
{
    public function index()
    {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('\Modules\login\Views\register', $data);
    }
    //save data
    public function save(){
        // include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name' => 'required|min_length[3]|max_length[20]',
            'email' =>    'required|min_length[5]|max_length[50]|valid_email|is_unique[login.user_email]',
            'password' => 'required|min_length[4]|max_length[200]',
            'conf_password' => 'matches[password]'
        ];
        if($this->validate($rules)){

            $request = \Config\Services::request();
            $model = new login_model();
            $data = [
                'user_name' => $request->getVar('name'),
                'user_email' => $request->getVar('email'),
                'user_password' => password_hash($request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $model->save($data);
            return redirect()->to('page/login');
        }
        else{
            $data['validation'] = $this->validator;
            return view('\Modules\login\Views\register', $data);
        }
    }
}
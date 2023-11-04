<?php

namespace App\Controllers;
use App\Models\M_User;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = service('session');
        $this->userModel = new M_User();
    }
    
    public function index(): string
    {
        $data['title'] = 'Login';
        return view('login', $data);
    }

    public function prosesLogin()
    {
        \Config\Services::session();
        $data['title'] = 'Proses Login';
        $uname         = $this->request->getPost('uname');
        $user_pwd      = $this->request->getPost('user_pwd');

        if(empty($uname))
        {
            $error = 'Username tidak boleh Kosong!';
        }
        else {
            if(empty($user_pwd)){
                $error = 'Password tidak boleh kosong!';
            }
            else{
                $data_user = $this->userModel->get_data_user_by_username($uname)->getRowArray();
                
                if(empty($data_user)){
                    $error = 'Username atau assword yang Anda masukkan salah!';
                }
                else{
                    if(password_verify($user_pwd, $data_user['usr_pwd'])){
                        session()->set($data_user);
                        // dd(session());
                        return redirect()->to('/');
                    }else{
                        $error = 'Username atau password yang Anda masukkan salah!';
                    }
                }
                
            }
        }

        if($error) {
            $this->session->setFlashdata('error', $error);
            $this->session->setFlashdata('data_uname', $uname);
            $this->session->setFlashdata('data_password', $user_pwd);
            return redirect()->to('/login');
        }


        return view('login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

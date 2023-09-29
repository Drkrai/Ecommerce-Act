<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    private $product;
    private $category;
    private $login;
    function __construct(){
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
        $this->login = new \App\Models\LoginModel();
    }

    public function index()
    {
        $data['product']=$this->product->findAll();
        return view('user',$data);
    }
    public function viewProduct(){
        return view('productView');
    }
    public function register(){
        helper(['form']);
        $data=[];
        echo view('signup',$data);
    }
    public function registerAuth(){
        helper(['form']);
        $data=[];
        $rules=[
            'username'=>'required|min_length[4]|max_length[100]valid_email|is_unique[login.username]',
            'password'=>'required|min_length[4]|max_length[50]',
            'confirmpassword'=>'matches[password]'
        ];
        if($this->validate($rules)){
            $data=[
                'username'=>$this->request->getVar('username'),
                'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
            ];
            $this->login->save($data);
            return redirect()->to('/signup');
        }
        else{
            $data['validation']=$this->validator;
            echo view('signup',$data);
        }
    }
    public function login(){
        helper(['form']);
        echo view('loginView');
    }
    public function loginAuth(){
        $session=session();
        $username=$this->request->getVar('username');
        $password=$this->request->getVar('password');
        $data=$this->login->where('username',$username)->first();
        if($data){
            $pass=$data['password'];
            $authenticatePassword=password_verify($password,$pass);
        
        if($authenticatePassword){
            $ses_data=[
                'id'=>$data['id'],
                'username'=>$data['username'],
                'isLoggedin'=>true,
            ];
            $session->set($ses_data);
            return redirect()->to('/profile');
        }else{
            $session->setFlashdata('msg', 'Password is incorrect');
            return redirect()->to('/signup');
        }
    }else{
            $session->setFlashdata('msg', 'Email does not exist');
            return redirect()->to('/signup');
        }
    }

}

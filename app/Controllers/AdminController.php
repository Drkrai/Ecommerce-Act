<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    private $product;
    private $category;
    private $admin;
    function __construct(){
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
        $this->admin = new \App\Models\AdminLogin();
    }

    public function adminView(){
        $data=['product'=>$this->product->findAll(),
        'category'=>$this->category->findAll(),
    ];
        return view('adminView',$data);
    }

    public function showInsertProduct(){
        $data['category']=$this->category->findAll();
        return view('addProduct',$data);
    }

    public function insertProduct(){
        $id=$_POST['id']; 
        
        $file= $this->request->getFile('image');
        $name=$file->getName();
        if($file->isValid() && !$file->hasMoved()){
            if(file_exists('public/'.$name)){
                unlink('public/'.$name);
            }
            $file->move('public/',$name);
        }
        $data=[
        'name'=>$this->request->getVar('name'), 
        'description'=>$this->request->getVar('description'), 
        'price'=>$this->request->getVar('price'), 
        'category'=>$this->request->getVar('category'), 
        'image'=>$name,
        'quantity'=>$this->request->getVar('quantity')];
        if($id!=null){
            $this->product->set($data)->where('id', $id)->update();
        }else{
        $this->product->save($data);
        }
        return redirect()->to('/adminView');
        
    }
    public function delete($id){
        $this->product->delete($id);
        return redirect()->to('/adminView');
    }

    public function register(){
        helper(['form']);
        $data=[];
        echo view('adminSignin',$data);
    }
    public function registerAdmin(){
        helper(['form']);
        $data=[];
        $rules=[
            'username'=>'required|min_length[4]|max_length[100]valid_email',
            'email'=> 'required|min_length[4]|max_length[100]|valid_email|is_unique[admin.email]',
            'password'=>'required|min_length[4]|max_length[50]',
            'confirmpassword'=>'matches[password]'
        ];
        if($this->validate($rules)){
            $data=[
                'username'=>$this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT)
            ];
            $this->admin->save($data);
            return redirect()->to('/adminLogin');
        }
        else{
            $data['validation']=$this->validator;
            echo view('adminSignin',$data);
        }
    }
    public function Adminlogin(){
        helper(['form']);
        echo view('adminLogin');
    }
    public function loginAdmin(){
        $session=session();
        $username=$this->request->getVar('username');
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $data=$this->admin->where('email',$email)->first();
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
        if($authenticatePassword){
            $ses_data=[
                'id'=>$data['id'],
                'username'=>$data['username'],
                'email'=>$data['email'],
                'isAdmin'=>true,
            ];
            $session->set($ses_data);
            return redirect()->to('/adminView');
        }else{
            $session->setFlashdata('msg', 'Password is incorrect');
            return redirect()->to('/adminLogin');
        }
    }else{
            $session->setFlashdata('msg', 'Email does not exist');
            return redirect()->to('/adminLogin');
        }
    }


}

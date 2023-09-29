<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    private $product;
    private $category;
    function __construct(){
        $this->product = new \App\Models\ProductModel();
        $this->category = new \App\Models\CategoryModel();
    }

    public function productList(){
        $data=['product'=>$this->product->findAll(),
        'category'=>$this->category->findAll(),
    ];
        return view('admin',$data);
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
        return redirect()->to('/');
        
    }
    public function delete($id){
        $this->product->delete($id);
        return redirect()->to('/');
    }


}

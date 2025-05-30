<?php 

namespace app\controllers\admin;

use vendor\Controller;
use app\models\Subcategory;
use app\models\Product;

class ProductController extends Controller 
{
    public function index()
    {
        $products = Product::selectAll();

        return $this->view('admin/products/index', compact('products'));
    }

    public function create()
    {
        //звернення до категорії щоб підтягнути в селект категорію до якої буде додаватися підкатегорія
        $subcategories = Subcategory::selectAll();

        return $this->view('admin/products/create', compact('subcategories'));
    }

    public function save() 
    {
        $id = Product::getLastId();
        //get value from post
        
        if(!empty($_FILES['image']['name'])) {
            $pathArr = explode('/', $_FILES['image']['type']);
            $fileName = $id . "." . $pathArr[1];
            $filePath = 'app\resources\img\products\\' . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
        }
        
        Product::insert($this->post(), $fileName);

        //return to page with all category
        return $this->redirect("products");

    }

    public function edit()
    {
        $id = $this->get('id');

        $product = Product::select($id);
        $subcategory = Subcategory::selectAll();

        return $this->view('admin/products/edit', compact('subcategory', 'product'));

    }

    //update product
    public function update() 
    {
        $id = $this->post('id');
        
        if(!empty($_FILES['image']['name'])) {
            $pathArr = explode('/', $_FILES['image']['type']);
            $fileName = $id . "." . $pathArr[1];
            $filePath = 'app\resources\img\products\\' . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $filePath);
        }
        
        Product::update($this->post(), $fileName);
        return $this->redirect("products");
    }

    //delete product
    public function delete()
    {
        Product::delete($this->post('id'));

        return $this->redirect("products");
    }
}
<?php

namespace app\controllers\admin;

use vendor\Controller;
use app\models\Category;
use app\models\Subcategory;

class SubcategoryController extends Controller 
{
    public function index() 
    {
        $subcategories = Subcategory::selectAll();

        return $this->view('admin/subcategories/index', compact('subcategories'));
    }

    public function create()
    {
        //звернення до категорії щоб підтягнути в селект категорію до якої буде додаватися підкатегорія
        $categories = Category::selectAll();

        return $this->view('admin/subcategories/create', compact('categories'));
    }

    public function save() 
    {
        //get value from post
        Subcategory::insert($this->post());

        //return to page with all category
        return $this->redirect("subcategories");

    }

    public function edit()
    {
        $id = $this->get('id');

        $subcategory = Subcategory::select($id);
        // $this->dd($category);
        return $this->view('admin/subcategories/edit', compact('subcategory'));

    }

    //update categories
    public function update() 
    {
        Subcategory::update($this->post());

        return $this->redirect("subcategories");
    }

    //delete categories
    public function delete()
    {
        Subcategory::delete($this->post('id'));

        return $this->redirect("subcategories");
    }
}

<?php

namespace app\controllers\admin;

use vendor\Controller;
use app\models\Category;

class CategoryController extends Controller 
{
    public function index() 
    {
        $categories = Category::selectAll();

        return $this->view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        return $this->view('admin/categories/create');
    }

    public function save() 
    {
        //get value from post
        Category::insert($this->post());

        //return to page with all category
        return $this->redirect("categories");

    }

    public function edit()
    {
        $id = $this->get('id');

        $category = Category::select($id);
        // $this->dd($category);
        return $this->view('admin/categories/edit', compact('category'));

    }

    //update categories
    public function update() 
    {
        Category::update($this->post());

        return $this->redirect("categories");
    }

    //delete categories
    public function delete()
    {
        Category::delete($this->post('id'));

        return $this->redirect("categories");
    }
}
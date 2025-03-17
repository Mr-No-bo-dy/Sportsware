<?php

namespace app\controllers\site;

use vendor\Controller;
use app\models\Product;
use app\models\Category;

class ProductController extends Controller 
{
    public function catalog()
    {
        $sort = $this->get('sort');
        $filters = $this->get();
        unset($filters['sort']);
        $products = Product::selectAll($filters, $sort);
        $categories = Category::selectCategories();
        // $this->dd($categories);
        return $this->view('site/catalog', compact('products', 'categories'));
    }
    
    public function card()
    {
        $id = $this->get('id');
        $product = Product::card($id);

        return $this->view('site/product', compact('product'));

    }
}
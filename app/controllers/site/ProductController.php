<?php

namespace app\controllers\site;

use vendor\Controller;
use app\models\Product;

class ProductController extends Controller 
{
    public function catalog()
    {
        $products = Product::selectAll();

        return $this->view('site/catalog', compact('products'));
    }
    
    public function card()
    {
        $id = $this->get('id');
        $product = Product::card($id);

        return $this->view('site/product', compact('product'));

    }
}
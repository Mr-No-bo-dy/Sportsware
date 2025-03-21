<?php

namespace app\controllers\site;

use vendor\Controller;
use app\models\Product;
use app\models\Category;
use app\services\Pagination;

class ProductController extends Controller 
{
    public function catalog()
    {
        $sort = $this->get('sort');
        $filters = $this->get();
        unset($filters['sort']);
        $products = Product::selectAll($filters, $sort);
        $categories = Category::selectCategories();

        $pagination = new Pagination(count($products), 6);
        $page = $_GET['page'] ?? 1;
        $products = $pagination->getItemsPerPage($products, (int)$page);
        $links = $pagination->getLinks((int)$page);
        // $this->dd($productsPerPage, $links);

        return $this->view('site/catalog', compact('products', 'categories', 'links'));
    }
    
    public function card()
    {
        $id = $this->get('id');
        $product = Product::card($id);

        return $this->view('site/product', compact('product'));

    }
}
<?php

namespace app\controllers\site;

use vendor\Controller;
use app\models\Order;
use app\models\Product;

class OrderController extends Controller 
{   
    //add product to cart
    public function addCart()
    {
        $id = $this->post('id');

        $product = Product::select($id);

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                "id" => $product['id'],
                "title" => $product['title'],
                "price" => $product['price'],
                "total_price" => $product['price'],
                "image" => $product['image'],
                "color" => $product['color'],
                "size" => $product['size'],
                "quantity" => 1 
            ];
        }
        $this->dd($_SESSION['cart'][$id]);
    }

    //open cart
    public function openCart()
    {
        return $this->view('site/cart');
    }

    //quantity +-
    public function quantity()
    {
        $id = $this->post('id');

        if(isset($_POST['minus'])) {
            $_SESSION['cart'][$id]['quantity'] -= 1;
            
        } else if(isset($_POST['plus'])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        }
        //change total price of product
        $_SESSION['cart'][$id]['total_price'] = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
        // $this->dd($_SESSION['cart'][$id]);
        return $this->view('site/cart');
    }

    //delete product in czrt
    public function delete()
    {
        $id = $this->post('id');

        unset($_SESSION['cart'][$id]);
        
        return $this->view('site/cart');
    }
    
    //redirect to create page
    public function createPage() 
    {
        Order::save();

        unset($_SESSION['cart']);

        return $this->view('site/succes');
        

    }
}
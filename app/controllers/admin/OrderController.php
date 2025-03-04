<?php 

namespace app\controllers\admin;

use vendor\Controller;
use app\models\Order;
use app\models\Product;
use app\models\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::selectAll();

        return $this->view('admin/orders/index', compact('orders'));
    }
}
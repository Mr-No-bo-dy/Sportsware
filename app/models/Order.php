<?php 

namespace app\models;

use PDOException;
use Exception;
use vendor\Model;

class Order extends Model 
{
    protected $table = "orders";
    protected $primaryKey = "id";
    public $fillable = [
        'product_id',
        'user_id',
        'count',
        'total_price',
        'date'
    ];

    //read all orders in admin panel, join orders with table products and users
    public static function selectAll()
    {
        $stmt = Product::builder()->prepare('SELECT o.*, p.title AS product, CONCAT(u.name, " ", u.surname) AS customer
            FROM orders o
            JOIN products p ON o.product_id = p.id
            JOIN users u ON o.user_id = u.id
        ');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //save order in table
    public static function save()
    {
        $stmt = Order::builder()->prepare("INSERT INTO orders (user_id, product_id, count, total_price) 
            VALUES (:user_id, :product_id, :count, :total_price)");

        foreach ($_SESSION['cart'] as $id => $item) {
            $stmt->execute([
                'user_id' => $_SESSION['user']['id'],
                'product_id' => $id,
                'count' => $item['quantity'],
                'total_price' => $item['total_price']
            ]);
        }
        
    }

    public static function saveViaTransaction()
    {   
        try {
            $pdo = Order::builder(); // Отримуємо підключення до бази даних
            $pdo->beginTransaction(); // Починаємо транзакцію

            $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_id, count, total_price) 
                VALUES (:user_id, :product_id, :count, :total_price)");

            foreach ($_SESSION['cart'] as $id => $item) {
                $stmt->execute([
                    'user_id' => $_SESSION['user']['id'],
                    'product_id' => $id,
                    'count' => $item['quantity'],
                    'total_price' => $item['total_price']
                ]);
            }

            $pdo->commit(); // Підтверджуємо транзакцію
        } catch (PDOException $e) {
            $pdo->rollBack(); // Відкочуємо транзакцію у разі помилки
            throw new Exception("Помилка при збереженні замовлення: " . $e->getMessage());
        }

    }

}
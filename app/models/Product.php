<?php

namespace app\models;

use vendor\Model;

class Product extends Model 
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $fillable = [
        'title',
        'description',
        'price', 
        'color',
        'size',
        'image'
    ];

    public static function selectAll() 
    {
        $stmt = Product::builder()->prepare('SELECT p.*, s.title AS subcategory 
        FROM subcategories s
        JOIN products p ON p.subcategory_id = s.id');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function card($id) 
    {
        $stmt = Product::builder()->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    //get id image
    public static function getLastId() 
    {
        // return Product::builder()->lastInsertId() + 1;
        $stmt = Product::builder()->prepare('SELECT MAX(id) FROM products');
        $stmt->execute();
        return $stmt->fetchColumn() + 1;
    }

    // create
    public static function insert($post, $fileName) 
    {
        // return object PDO

        $stmt = Product::builder()->prepare('INSERT INTO products (title, description, subcategory_id, price, color, size, image) VALUES (:title, :description, :subcategory_id, :price, :color, :size, :image)');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description'],
            'price' => $post['price'], 
            'color' => $post['color'],
            'size' => $post['size'],
            'image' => $fileName,
            'subcategory_id' => $post['subcategory_id'] //форейн кі для того щоб звязати з таблицею сабкатегорій 
        ]);

    }

    //select product for update
    public static function select($id) 
    {
        $stmt = Product::builder()->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetch();
    }

    //update 
    public static function update($post, $fileName) 
    {
        $stmt = Product::builder()->prepare('UPDATE products 
            SET title = :title, description = :description, subcategory_id = :subcategory_id, price = :price, color = :color, size = :size, image = :image
            WHERE id = :id');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description'],
            'price' => $post['price'], 
            'color' => $post['color'],
            'size' => $post['size'],
            'image' => $fileName,
            'id' => $post['id'],
            'subcategory_id' => $post['subcategory_id']
        ]);
    }

    public static function delete($id)
    {
        $stmt = Product::builder()->prepare('DELETE FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
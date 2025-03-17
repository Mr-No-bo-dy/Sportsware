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

    public static function selectAll($filters = [], $sort = 'new') 
    {
        $sql = 'SELECT p.*, s.title AS subcategory 
            FROM products p
            JOIN subcategories s ON p.subcategory_id = s.id
            JOIN categories c ON s.category_id = c.id';

        if (!empty($filters['title'])) {
            $sql .= self::addFilters($sql) . " p.title LIKE :title";
        }
        if (!empty($filters['category_id'])) {
            $sql .= self::addFilters($sql) . " c.id = :id";
        }
        if (!empty($filters['maxPrice'])) {
            $sql .= self::addFilters($sql) . " p.price <= :max";
        }
        if (!empty($filters['minPrice'])) {
            $sql .= self::addFilters($sql) . " p.price >= :min";
        }
        
        if ($sort == "new") {
            $sql .= " ORDER BY p.id";
        } else if ($sort == "priceDesc") {
            $sql .= " ORDER BY p.price DESC";
        } else if ($sort == "priceAsc") {
            $sql .= " ORDER BY p.price ASC";
        }

        $stmt = Product::builder()->prepare($sql);

        if(!empty($filters['title'])) {
            $stmt->bindValue(":title", '%' . $filters['title'] . '%');
        }
        if(!empty($filters['category_id'])) {
            $stmt->bindValue(":id", $filters['category_id']);
        }
        if(!empty($filters['maxPrice'])) {
            $stmt->bindValue(":max", $filters['maxPrice']);
        }
        if(!empty($filters['minPrice'])) {
            $stmt->bindValue(":min", $filters['minPrice']);
        }

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
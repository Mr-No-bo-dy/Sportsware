<?php
namespace app\models;

use vendor\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $filable = [
        'title',
        'description'
    ];

    public static function selectAll() 
    {
        // return object PDO
        $stmt = Category::builder()->prepare('SELECT * FROM categories');
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    
    // create
    public static function insert($post) 
    {
        // return object PDO
        $stmt = Category::builder()->prepare('INSERT INTO categories (title, description) VALUES (:title, :description)');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description']
        ]);
    }
    //select category for update
    public static function select($id) 
    {
        $stmt = Category::builder()->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetch();
    }

    //update 
    public static function update($post) 
    {
        $stmt = Category::builder()->prepare('UPDATE categories SET title = :title, description = :description WHERE id = :id');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description'],
            'id' => $post['id']
        ]);
    }

    //delete
    public static function delete($id)
    {
        $stmt = Category::builder()->prepare('DELETE FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }


}
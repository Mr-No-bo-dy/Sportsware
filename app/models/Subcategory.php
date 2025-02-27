<?php
namespace app\models;

use vendor\Model;

class Subcategory extends Model 
{
    protected $table = 'subcategories';
    protected $primaryKey = 'id';
    protected $foreignKey = 'category_id';
    public $filable = [
        'title',
        'description'
    ];

    public static function selectAll() 
    {
        // return object PDO
        $stmt = Subcategory::builder()->prepare('SELECT s.*, c.title AS category_title FROM categories c JOIN subcategories s ON s.category_id = c.id');
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    
    // create
    public static function insert($post) 
    {
        // return object PDO
        $stmt = Subcategory::builder()->prepare('INSERT INTO subcategories (title, description, category_id) VALUES (:title, :description, :category_id)');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description'],
            'category_id' => $post['category_id'] //форейн кі для того щоб звязати з таблицею категорій 
        ]);
    }

    //select category for update
    public static function select($id) 
    {
        $stmt = Subcategory::builder()->prepare('SELECT * FROM subcategories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        
        return $stmt->fetch();
    }

    //update 
    public static function update($post) 
    {
        $stmt = Subcategory::builder()->prepare('UPDATE subcategories SET title = :title, description = :description, category_id = :category_id WHERE id = :id');
        $stmt->execute([
            'title' => $post['title'],
            'description' => $post['description'],
            'id' => $post['id'],
            'category_id' => $post['category_id']
        ]);
    }

    public static function delete($id)
    {
        $stmt = Subcategory::builder()->prepare('DELETE FROM subcategories WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
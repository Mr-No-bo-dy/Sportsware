<?php

namespace app\models;

use Exception;
use vendor\Model;

class User extends Model 
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $filable = [
        'name',
        'surname',
        'email',
        'phone',
        'password'
    ];
    //add new user for table users
    public static function insertUser($post)
    {
        try {
            if (!empty($post['name']) && !empty($post['email']) && !empty($post['phone']) && !empty($post['password'])) {

                if (!preg_match('#^(\+\d{1,4})?(\(?\d{1,3}\)?)\s?\-?\s?(\d[\s-]?){6}\d$#', $post['phone'])) {
                    throw new Exception("Введіть коректний номер телефону");
                }
                
                if(!preg_match('#^[a-zA-Z][a-zA-Z0-9_-]+[a-zA-Z0-9]@([a-z_-]+(\.\w+)?(\.\w{2,3}))$#', $post['email'])) {
                    throw new Exception("Введіть коректний email");
                }
                
                if (strlen($post['password']) < 8) {
                    throw new Exception("Пароль має містити не менше 8 символів");
                }
                $hash = password_hash($post['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                
                $stmt = User::builder()->prepare('INSERT INTO users (name, surname, email, phone, password) VALUES (:name, :surname, :email, :phone, :password)');
                $stmt->execute([
                    'name' => $post['name'],
                    'surname' => $post['surname'],
                    'email' => $post['email'],
                    'phone' => $post['phone'],
                    'password' => $hash
                ]);//три окремі перевірки на емейл телефон і довж паролю і виводити помилки на вю і зробити сторінку профілю з можливістю редагування
            } else {
                throw new Exception("Не всі поля заповнені");
            }
        } catch(Exception $e) {
            return $errorReg = $e->getMessage();
        }
    }

    //check user data for enter
    public static function login($post)
    { 
        try {
            if(str_contains($post['login'], '@')) {
                $sql = 'SELECT * FROM users WHERE email = :login';
            } else {
                $sql = 'SELECT * FROM users WHERE name = :login';
            }

            $stmt = User::builder()->prepare($sql);
            $stmt->execute(['login' => $post['login']]);
            $user= $stmt->fetch();

            $result = '';
            // self::dd($_SESSION, $user);
            if($user && password_verify($post['password'], $user['password'])) {
                $_SESSION['user'] = $user;
            } else {
                throw new Exception("Пароль або логін введено некоректно, введіть коректні дані");
            }
        } catch(Exception $error) {
            $result = $error->getMessage();
        } finally {
            return $result;
        }
    }

    //cabinet info
    public static function update($post) 
    {
        $stmt = User::builder()->prepare('UPDATE users SET name = :name, surname = :surname, phone = :phone, email = :email  WHERE id = :id');
        $stmt->execute([
            'name' => $post['name'],
            'surname' => $post['surname'],
            'phone' => $post['phone'],
            'email' => $post['email'],
            'id' => $post['id']
        ]);
        //return new data user
        $stmt = User::builder()->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $post['id']]);
        return $stmt->fetch();
    }

    //delete user
    public static function delete($id) 
    {
        $stmt = User::builder()->prepare('DELETE FROM users WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

}
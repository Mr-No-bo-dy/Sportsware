<?php

namespace vendor;

use PDO;

class Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];

    // Connection to DataBase
    public static function builder(): PDO
    {
        return Database::connection();
    }

    // Handy var_dump
    public static function dd(...$vars): void
    {
        echo '<pre>';
        foreach ($vars as $var) {
            var_dump($var);
            echo '<hr>';
        }
        echo '</pre>';
        die;
    }

    //перевірка кількості полів фільрів
    public static function addFilters($sql)
    {
        if(str_contains($sql, 'WHERE')) {
            $addFilter = " AND";
        } else {
            $addFilter = " WHERE";
        }
        return $addFilter;
        
    }
}
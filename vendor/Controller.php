<?php

namespace vendor;

class Controller
{
    // __construct
    public function __construct()
    {
        // Start Session, if not started already
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Render view file with data
    public function view(string $name, array $data = []): void
    {
        $viewPath = 'app/resources/views/' . $name . '.php';
        if (file_exists($viewPath)) {
            extract($data);
            include($viewPath);
        } else {
            $error = 'No such view file: <b>' . $viewPath . '</b>';
            $this->view('templates/404', compact('error'));
        }
    }

    // Redirect to specified URI
    public function redirect($uri): void
    {
        header('Location: ' . $uri);
        exit;
    }

    // Handy var_dump
    public function dd(...$vars): void
    {
        echo '<pre>';
        foreach ($vars as $var) {
            var_dump($var);
            echo '<hr>';
        }
        echo '</pre>';
        die;
    }

    // Get data from $_POST
    public function post(mixed $key = null): mixed
    {
        $postData = [];
        if (!empty($_POST)) {
            $postData = $_POST;
            if (!is_null($key)) {
                $postData = $_POST[$key] ?? null;
            }
        }

        return $postData;
    }

    // Get data from $_GET
    public function get(mixed $key = null): mixed
    {
        $getData = [];
        if (!empty($_GET)) {
            $getData = $_GET;
            if (!is_null($key)) {
                $getData = $_GET[$key] ?? null;
            }
        }

        return $getData;
    }
}

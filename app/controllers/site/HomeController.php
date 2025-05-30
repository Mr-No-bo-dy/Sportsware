<?php

namespace app\controllers\site;

use vendor\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $username = getenv('USERNAME') ?: getenv('USER') ?: 'guest';

        return $this->view('site/index', compact('username'));
    }
}
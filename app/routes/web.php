<?php

$urlRoutes = [
    // URI => directory / controller / method
    '' => 'site/home/index',
    'home' => 'site/home/index',

    'categories' => 'admin/category/index',
    'categoryCreate' => 'admin/category/create',
    'categorySave' => 'admin/category/save',
    'categoryEdit' => 'admin/category/edit',
    'categoryUpdate' => 'admin/category/update',
    'categoryDelete' => 'admin/category/delete',
    
    'register' => 'site/user/register',
    'login' => 'site/user/login',
    'cabinet' => 'site/user/cabinet',
    'updateUser' => 'site/user/update',
    'deleteUser' => 'site/user/delete',
    'logout' => 'site/user/logout',
    
];

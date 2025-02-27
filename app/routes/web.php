<?php

$urlRoutes = [
    // URI => directory / controller / method
    '' => 'site/home/index',
    'home' => 'site/home/index',

    'admin/categories' => 'admin/category/index',
    'admin/categoryCreate' => 'admin/category/create',
    'admin/categorySave' => 'admin/category/save',
    'admin/categoryEdit' => 'admin/category/edit',
    'admin/categoryUpdate' => 'admin/category/update',
    'admin/categoryDelete' => 'admin/category/delete',
    
    'admin/subcategories' => 'admin/subcategory/index',
    'admin/subcategoriesCreate' => 'admin/subcategory/create',
    'admin/subcategorySave' => 'admin/subcategory/save',
    'admin/subcategoryEdit' => 'admin/subcategory/edit',
    'admin/subcategoryUpdate' => 'admin/subcategory/update',
    'admin/subcategoryDelete' => 'admin/subcategory/delete',

    'register' => 'site/user/register',
    'login' => 'site/user/login',
    'cabinet' => 'site/user/cabinet',
    'updateUser' => 'site/user/update',
    'deleteUser' => 'site/user/delete',
    'logout' => 'site/user/logout',

    'admin/users' => 'admin/user/index',
    
];

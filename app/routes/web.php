<?php

$urlRoutes = [
    // URI => directory / controller / method
    '' => 'site/home/index',
    'home' => 'site/home/index',
    'catalog' => 'site/product/catalog',
    'card' => 'site/product/card',
    'cart' => 'site/order/openCart',

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
    
    'admin/products' => 'admin/product/index',
    'admin/productCreate' => 'admin/product/create',
    'admin/productSave' => 'admin/product/save',
    'admin/productEdit' => 'admin/product/edit',
    'admin/productUpdate' => 'admin/product/update',
    'admin/productDelete' => 'admin/product/delete',
    
    'admin/orders' => 'admin/order/index',

    'addToCart' => 'site/order/addCart',
    'quantity' => 'site/order/quantity',
    'delete' => 'site/order/delete',
    'orderSave' => 'site/order/createPage',
    'succes' => 'site/order/succes',

    'register' => 'site/user/register',
    'login' => 'site/user/login',
    'cabinet' => 'site/user/cabinet',
    'updateUser' => 'site/user/update',
    'deleteUser' => 'site/user/delete',
    'logout' => 'site/user/logout',

    'admin/users' => 'admin/user/index',
    
];

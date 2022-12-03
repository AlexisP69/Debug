<?php

require __DIR__ . '/router.php';
Var_dump(__DIR__);
exit();

Route::add('/', function () {
    require __DIR__ . '/src/View/index.php';
});

Route::add('/login', function () {
    require __DIR__ . '/src/View/login.php';
});

Route::add('/register', function () {
    require __DIR__ . '/src/View/register.php';
});

Route::add('/products', function () {
    require __DIR__ . '/views/products.php';
});

Route::add('/profile', function () {
    require __DIR__ . '/src/View/profile.php';
});

Route::submit();

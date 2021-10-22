<?php

use models\{Product, Order, Cart, User};

//регистрируем автозагрузчик
spl_autoload_register(static function ($className) {

    $file = '../' . str_replace("\\","/",$className) .'.php';

    if(file_exists($file)) {
        require $file;
    }

});

$order = new Order();
//$product = new Product();
//$user = new User();
$cart = new Cart();



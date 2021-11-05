<?php
declare(strict_types=1);

use app\engine\{Db, Autoload};

require '../engine/Autoload.php';

//регистрируем автозагрузчик
spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db("127.0.0.1", "store_db", "utf8","root", "12909043Ee!");
$db->closeConnection();
$db->getAll('Client','',[]);


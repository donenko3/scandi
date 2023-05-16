<?php

require_once __DIR__.'/vendor/autoload.php';
use app\core\Application;
use app\core\models\Furniture;
use app\core\models\Book;
use app\core\models\DVD;
use app\core\Controllers\ProductController;
use app\core\Request;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-type: application/json; charset= UTF-8");

Header("Access-Control-Allow-Credentials", "true");
Header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
Header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");


$ctr = new ProductController(new Furniture(), new Book(), new DVD());

$parts = explode('/', $_SERVER["REQUEST_URI"]);

$ctr->processRequest($_SERVER["REQUEST_METHOD"], $parts[1]);


?>
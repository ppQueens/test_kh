<?php


if (PHP_SAPI == 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'])['path'];
    if (is_file($file)) return false;
}


if (preg_match('//', $_SERVER["REQUEST_URI"])) {
    require_once "site/autoloader.php";
    require_once "site/route.php";
    new Auto_Loader(__DIR__ . "/site/mvc_core/");
    new Auto_Loader(__DIR__ . "/site/database/");
    new Auto_Loader(__DIR__ . "/site/models/");
    new Auto_Loader(__DIR__ . "/site/controllers/");

    Route::start();
}
else return "Something goes wrong!";
?>
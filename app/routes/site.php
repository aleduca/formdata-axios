<?php

use app\controllers\Home;
use app\controllers\Login;
use app\controllers\Upload;

$app->get('/', Home::class . ':index');
$app->get('/login', Login::class . ':index');
$app->post('/login', Login::class . ':store');
$app->get('/logout', Login::class . ':destroy');
$app->get('/upload', Upload::class . ':index');
$app->post('/upload', Upload::class . ':store');

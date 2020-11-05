<?php

use app\controllers\User;

$app->get('/api/users', User::class . ':index');

<?php

ini_set('display_errors', 1);
require_once 'application/bootstrap.php';
require_once 'application/components/Db.php';

require_once 'application/core/Model.php';
require_once 'application/core/View.php';
require_once 'application/core/Controller.php';
require_once 'application/core/Route.php';

Route::start(); // запускаем маршрутизатор
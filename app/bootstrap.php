<?php

use Bank\App;

session_start();
define('URL', 'http://bank.fun/');
require __DIR__ . '/../vendor/autoload.php';

echo App::start();

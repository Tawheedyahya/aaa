<?php

$r->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
$r->addRoute('GET', '/about', ['App\Controllers\HomeController', 'about']);
$r->addRoute('GET', '/user/{id:\d+}', ['App\Controllers\HomeController', 'show']);
<?php

$r->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
$r->addRoute('GET', '/about', ['App\Controllers\HomeController', 'about']);
$r->addRoute('GET', '/projects', ['App\Controllers\HomeController', 'projects']);
$r->addRoute('GET', '/projects/{id:\d+}', ['App\Controllers\HomeController', 'project']);
$r->addRoute('GET', '/contact', ['App\Controllers\HomeController', 'contact']);
$r->addRoute('GET', '/user/{id:\d+}', ['App\Controllers\HomeController', 'show']);
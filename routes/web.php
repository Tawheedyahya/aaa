<?php

$r->addRoute('GET', '/', ['App\Controllers\HomeController', 'index']);
$r->addRoute('GET', '/about', ['App\Controllers\HomeController', 'about']);
$r->addRoute('GET', '/projects', ['App\Controllers\HomeController', 'projects']);
$r->addRoute('GET', '/projects/{id:\d+}', ['App\Controllers\HomeController', 'project']);
$r->addRoute('GET', '/contact', ['App\Controllers\ContactController', 'show']);
$r->addRoute('POST', '/contact/send', ['App\Controllers\ContactController', 'send']);
$r->addRoute('GET', '/user/{id:\d+}', ['App\Controllers\HomeController', 'show']);

// Admin routes
$r->addRoute('GET', '/admin/projects', ['App\Controllers\AdminController', 'index']);
$r->addRoute('GET', '/admin/projects/create', ['App\Controllers\AdminController', 'create']);
$r->addRoute('POST', '/admin/projects/store', ['App\Controllers\AdminController', 'store']);
$r->addRoute('GET', '/admin/projects/edit/{id:\d+}', ['App\Controllers\AdminController', 'edit']);
$r->addRoute('POST', '/admin/projects/edit/{id:\d+}', ['App\Controllers\AdminController', 'update']);
$r->addRoute('POST', '/admin/projects/delete/{id:\d+}', ['App\Controllers\AdminController', 'destroy']);
$r->addRoute('POST', '/admin/projects/delete-image/{id:\d+}', ['App\Controllers\AdminController', 'deleteImage']);

$r->addRoute('GET', '/vending', ['App\Controllers\VendingController', 'index']);
$r->addRoute('GET', '/vending/create', ['App\Controllers\VendingController', 'create']);
$r->addRoute('POST', '/vending/create', ['App\Controllers\VendingController', 'store']);
$r->addRoute('GET', '/vending/{id:\d+}/edit', ['App\Controllers\VendingController', 'edit']);
$r->addRoute('POST', '/vending/{id:\d+}/edit', ['App\Controllers\VendingController', 'update']);
$r->addRoute('POST', '/vending/{id:\d+}/delete', ['App\Controllers\VendingController', 'destroy']);
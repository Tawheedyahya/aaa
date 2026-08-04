<?php
// helpers.php

if (!defined('SITE_URL')) {
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

    if (strpos($host, 'localhost') !== false) {
        define('SITE_URL', 'http://localhost:8000'); // no trailing slash
    } else {
        define('SITE_URL', 'https://aaaled.in'); // no trailing slash
    }
}

// Set this to '' if your document root already points to /public
// Set this to '/public' if your document root is the project root
if (!defined('ASSET_BASE')) {
    define('ASSET_BASE', '/public');
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return SITE_URL . ASSET_BASE . '/' . ltrim($path, '/');
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        return $path === '' ? SITE_URL . '/' : SITE_URL . '/' . ltrim($path, '/');
    }
}

if (!function_exists('current_url')) {
    function current_url(): string
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host   = $_SERVER['HTTP_HOST'] ?? parse_url(SITE_URL, PHP_URL_HOST);
        $uri    = $_SERVER['REQUEST_URI'] ?? '/';
        return $scheme . '://' . $host . $uri;
    }
}

if (!function_exists('activeRoute')) {
    function activeRoute(string $route): string
    {
        $current = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $current = rtrim($current, '/') ?: '/';
        $route   = rtrim($route, '/') ?: '/';

        return $current === $route ? 'active' : '';
    }
}
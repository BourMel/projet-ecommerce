<?php

$settings = [];

$settings['devMode'] = true;

// slim settings
$settings['displayErrorDetails'] = true;
$settings['determineRouteBeforeAppMiddleware'] = true;

// path settings
$settings['root'] = dirname(__DIR__);
$settings['temp'] = $settings['root'] . '/tmp';
$settings['public'] = $settings['root'] . '/public';

// view settings
$settings['twig'] = [
    'path' => $settings['root'].'/views',
    'cache_enabled' => false,
    'cache_path' =>  $settings['temp'] . '/twig_cache'
];

// database settings
$settings['db']['host'] = 'localhost';
$settings['db']['username'] = 'root';
$settings['db']['password'] = '';
$settings['db']['database'] = 'ephedra';
$settings['db']['charset'] = 'utf8';
$settings['db']['collation'] = 'utf8_unicode_ci';
$settings['db']['driver'] = 'pdo_mysql';

return $settings;

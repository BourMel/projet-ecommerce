<?php

// source : https://odan.github.io/2017/11/30/creating-your-first-slim-framework-application.html#starting

use Slim\Container;

$container = $app->getContainer();

// activating routes in a subfolder
$container['environment'] = function () {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
    return new Slim\Http\Environment($_SERVER);
};

// register Twig View helper
$container['view'] = function (Container $container) {
    $settings = $container->get('settings');
    $viewPath = $settings['twig']['path'];

    $twig = new \Slim\Views\Twig($viewPath, [
        'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false
    ]);

    $loader = $twig->getLoader();
    $loader->addPath($settings['public'], 'public');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment($container->get('environment'));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $twig;
};

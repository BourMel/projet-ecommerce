<?php

/**
 * Slim container : register twig as view helper and then use it for our 404 page
 */

use Slim\Container;

$container = $app->getContainer();

// register twig as our view helper (used for rendering the 404 page)
$container['view'] = function (Container $container) {
    $settings = $container->get('settings');
    $viewPath = $settings['twig']['path'];

    $twig = new \Slim\Views\Twig($viewPath, [
        'cache' => $settings['twig']['cache_enabled'] ? $settings['twig']['cache_path'] : false
    ]);

    $loader = $twig->getLoader();
    $loader->addPath($settings['views'], 'views');

    // Instantiate and add Slim specific extension
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment($container->get('environment'));
    $twig->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $twig;
};


// when 404 page
$container['notFoundHandler'] = function ($container) {
    return function ($request, $response) use ($container) {
        // return 404.html
        return $container['view']->render($response, '404.html');
    };
};


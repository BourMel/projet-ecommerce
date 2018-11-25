<?php

// if user is logged in, no access to login page
$loggedInMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    $routeName = $route->getName();
    $groups = $route->getGroups();
    $methods = $route->getMethods();
    $arguments = $route->getArguments();

    $forbiddenRoutes = array('login');

    if (isset($_SESSION['user']) && in_array($routeName, $forbiddenRoutes)) {
        $response = $response->withRedirect('/');
        
    } else {
        $response = $next($request, $response);
    }

    return $response;
};

// if user is logged out, no access to account page
$loggedOutMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    $routeName = $route->getName();
    $groups = $route->getGroups();
    $methods = $route->getMethods();
    $arguments = $route->getArguments();

    $forbiddenRoutes = array('account');

    if (!isset($_SESSION['user']) && in_array($routeName, $forbiddenRoutes)) {
        $response = $response->withRedirect('/');
        
    } else {
        $response = $next($request, $response);
    }

    return $response;
};

// Apply the middleware to every request.
$app->add($loggedInMiddleware);
$app->add($loggedOutMiddleware);
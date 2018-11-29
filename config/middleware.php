<?php

// if user is logged in, no access to login page
$loggedInMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    
    if($route != null) {
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
        
    // 404 page, handled by next controller
    } else {
        $response = $next($request, $response);
    }

    return $response;
};

// if user is logged out, no access to account or buy page
$loggedOutMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    
    if($route != null) {
        $routeName = $route->getName();
        $groups = $route->getGroups();
        $methods = $route->getMethods();
        $arguments = $route->getArguments();
    
        $forbiddenRoutes = array('account', 'buy');
    
        if (!isset($_SESSION['user']) && in_array($routeName, $forbiddenRoutes)) {
            $response = $response->withRedirect('/connexion');
            
        } else {
            $response = $next($request, $response);
        }
        
    // 404 page, handled by next controller
    } else {
        $response = $next($request, $response);
    }
    
   

    return $response;
};


// Apply the middleware to every request.
$app->add($loggedInMiddleware);
$app->add($loggedOutMiddleware);


// call 404 before other middlewares are called (last added is first called)
$app->add(function ($request, $response, $next) use ($container) {

    // execute any request (goes through other controllers)
    $response = $next($request, $response);
    

    // if response render a 404
    if (404 === $response->getStatusCode() &&
        0   === $response->getBody()->getSize()) {
        // invoke custom handler
        $handler = $container['notFoundHandler'];
        return $handler($request, $response);
    }

    return $response;
});
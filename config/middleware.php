<?php

/**
 * Each of these middlewares is read at each request, beginning from the last one
 * to the first one
 */


/**
 * When user is LOGGED IN, no access to login page
 * The user is redirected to the home page
 */
$loggedInMiddleware = function ($request, $response, $next) {
    $route = $request->getAttribute('route');
    
    if($route != null) {
        // get the route name
        $routeName = $route->getName();
    
        $forbiddenRoutes = array('login');
    
        // if the route name is forbidden, redirect
        if (isset($_SESSION['user']) && in_array($routeName, $forbiddenRoutes)) {
            $response = $response->withRedirect('/');
            
        // else, just go on
        } else {
            $response = $next($request, $response);
        }
        
    // the route has no name : it's a 404 and will be handled by the next controller
    } else {
        $response = $next($request, $response);
    }

    return $response;
};

/**
 * When user is LOGGED OUT, no access to specific pages
 * The user is redirected to the connection page
 */
$loggedOutMiddleware = function ($request, $response, $next) {
    // get route name
    $route = $request->getAttribute('route');
    
    if($route != null) {
        $routeName = $route->getName();
    
        $forbiddenRoutes = array('account', 'buy');
    
        // if the route is forbidden, redirect 
        if (!isset($_SESSION['user']) && in_array($routeName, $forbiddenRoutes)) {
            $response = $response->withRedirect('/connexion');
            
        // else, go on with the request
        } else {
            $response = $next($request, $response);
        }
    
    // the route has no name : it's a 404 and will be handled by the next controller
    } else {
        $response = $next($request, $response);
    }
    
   

    return $response;
};



/**
 * Let the request happen. If it returns a 404 status, then redirect to 404 page.
 */
$handle404Middleware = function ($request, $response, $next) use ($container) {

    // execute any request (goes through other middlewares)
    $response = $next($request, $response);
    
    // if response render a 404
    if ($response->getStatusCode() == 404 && $response->getBody()->getSize() == 0) {
        // invoke custom handler
        $handler = $container['notFoundHandler'];
        return $handler($request, $response);
    }

    // else, return the expected page
    return $response;
};


// apply all middlewares

$app->add($loggedInMiddleware);
$app->add($loggedOutMiddleware);
$app->add($handle404Middleware);
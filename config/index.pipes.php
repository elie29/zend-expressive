<?php

use App\Middleware\Commun\RouteNotFoundMiddleware;
use App\Middleware\Commun\SessionMiddleware;
use App\Middleware\Outils\OutilsMiddleware;
use PhpMiddleware\PhpDebugBar\PhpDebugBarMiddleware;
use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;

/* @var \Zend\Expressive\Application $app */
if (DEV_MODE) {
    $app->pipe(PhpDebugBarMiddleware::class);
}
// Register the routing middleware in the middleware pipeline
$app->pipeRoutingMiddleware();

// Middleware for handling exceptions of all routes -> cf. container.php
$app->pipe('HandleExceptionMiddleware');

// Global middleware
$app->pipe(SessionMiddleware::class);
$app->pipe(BodyParamsMiddleware::class);

// Modules middleware
$app->pipe('/outils', OutilsMiddleware::class);

// At this point, dispatch the resolved route if found
$app->pipeDispatchMiddleware();

// Call this middleware if no route resolved: Keep it at the end !!!
$app->pipe(RouteNotFoundMiddleware::class);

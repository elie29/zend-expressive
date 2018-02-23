<?php

use Zend\Expressive\Helper\BodyParams\BodyParamsMiddleware;

/* @var \Zend\Expressive\Application $app */

// Register the routing middleware in the middleware pipeline
$app->pipeRoutingMiddleware();

// Middleware for handling exceptions of all routes -> cf. container.php
$app->pipe('HandleExceptionMiddleware');

// Global middleware
$app->pipe(BodyParamsMiddleware::class);

// Modules middleware
// $app->pipe('/path', actionClassName);

// At this point, dispatch the resolved route if found
$app->pipeDispatchMiddleware();

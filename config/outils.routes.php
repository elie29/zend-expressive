<?php

use App\Middleware\Outils\Ping\PingAction;
use App\Middleware\Outils\Uppercase\UppercaseAction;

/* @var \Zend\Expressive\Application $app */
$app->pipeRoutingMiddleware();

// One Middleware per action & per type
$app->get('/ping', PingAction::class, 'ping.route');

// The first route is not really needed and source of error
$app->get('/uppercase', UppercaseAction::class, 'uppercase.empty.route');
$app->get('/uppercase/{name}', UppercaseAction::class, 'uppercase.route');

// At the end
$app->pipeDispatchMiddleware();
<?php

use App\Middleware\Outils\Ping\PingAction;

/* @var \Zend\Expressive\Application $app */
$app->pipeRoutingMiddleware();

// One Middleware per action & per type
$app->get('/ping', PingAction::class, 'ping.route');

// At the end
$app->pipeDispatchMiddleware();
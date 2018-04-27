<?php

use App\Middleware\Outils\Download\PdfAction;
use App\Middleware\Outils\Ping\PingAction;
use App\Middleware\Outils\Sum\SumAction;
use App\Middleware\Outils\Uppercase\UppercaseAction;

/* @var \Zend\Expressive\Application $app */
$app->pipeRoutingMiddleware();

// One Middleware per action & per type
$app->get('/ping', PingAction::class, 'ping.route');

$app->get('/uppercase', UppercaseAction::class, 'uppercase.empty.route');
$app->get('/uppercase/{name}', UppercaseAction::class, 'uppercase.route');

$app->get('/pdf', PdfAction::class, 'pdf.route');

$app->post('/sum', SumAction::class, 'sum.post.route');

// At the end
$app->pipeDispatchMiddleware();
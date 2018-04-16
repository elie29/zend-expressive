<?php

/* @var \Zend\Expressive\Application $app */
$app->pipeRoutingMiddleware();

// One Middleware per action & per type

// At the end
$app->pipeDispatchMiddleware();
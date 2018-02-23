<?php

/* @var \Zend\Expressive\Application $app */
$app->pipeDispatchMiddleware();

// One Middleware per action & per type

// At the end
$app->pipeRoutingMiddleware();
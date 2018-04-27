<?php

use DebugBar\DebugBar;
use DebugBar\StandardDebugBar;
use Middlewares\Whoops;
use PhpMiddleware\PhpDebugBar\PhpDebugBarMiddleware;
use PhpMiddleware\PhpDebugBar\PhpDebugBarMiddlewareFactory;
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Router\FastRouteRouterFactory;
use Zend\Expressive\Router\RouterInterface;
use function DI\factory;
use function DI\get;

return [
    'config' => [
        'router' => [
            'fastroute' => [
                // Enable caching support for production:
                'cache_enabled' => !DEV_MODE,
                // Cache file path
                'cache_file' => BE_PATH . '/cache/fastroute.php.cache',
            ]
        ]
    ],
    RouterInterface::class => factory(FastRouteRouterFactory::class),
    Application::class => factory(ApplicationFactory::class),
    'HandleExceptionMiddleware' => get(Whoops::class),
    // Php debug bar
    DebugBar::class => get(StandardDebugBar::class),
    PhpDebugBarMiddleware::class => factory(PhpDebugBarMiddlewareFactory::class)
];

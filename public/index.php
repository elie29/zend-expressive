<?php

define('BE_PATH', dirname(__DIR__));
define('DEV_MODE', true);

chdir(BE_PATH);
require 'vendor/autoload.php';

use DI\ContainerBuilder;
use Zend\Expressive\Application;

// Keep the global namespace clean
call_user_func(function() {

    // 1. Create container with PHP-DI
    $builder = new ContainerBuilder();
    $builder->addDefinitions('config/container.php');
    $container = $builder->build();

    // 2. Create a new application
    $app = $container->make(Application::class);

    // 3. Include middlewares
    require 'config/index.pipes.php';

    // 4. Run the application
    $app->run();
});

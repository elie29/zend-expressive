<?php
namespace App\Middleware\Commun;

use DI\Container;
use Interop\Http\ServerMiddleware\MiddlewareInterface;

abstract class AbstractMiddleware implements MiddlewareInterface
{

    /**
     * @param Container in order to use make, get and has.
     */
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

}


<?php
namespace App\Middleware\Commun;

use DI\Container;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Application;

abstract class AbstractModuleMiddleware extends AbstractMiddleware
{

    public final function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        /* @var \Zend\Expressive\Application $app */
        $app = $this->container->make(Application::class);

        require $this->getConfig();

        return $app->process($request, $delegate);
    }

    /**
     * @return string Middleware routes path (eg. config/outils.routes.php)
     */
    abstract protected function getConfig(): string;
}


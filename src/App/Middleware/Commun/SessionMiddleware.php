<?php
namespace App\Middleware\Commun;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Helper\Exception\RuntimeException;

class SessionMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        if (session_start()) {
            return $delegate->process($request);
        }
        throw new RuntimeException('Session error');
    }
}


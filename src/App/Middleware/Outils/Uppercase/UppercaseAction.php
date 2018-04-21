<?php
namespace App\Middleware\Outils\Uppercase;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Exception\InvalidArgumentException;

class UppercaseAction implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $name = $request->getAttribute('name');
        // Never possible if route is defined correctly
        if (! $name) {
            throw new InvalidArgumentException('Name is required.');
        }

        return new JsonResponse([
            'name' => strtoupper($name)
        ]);
    }
}


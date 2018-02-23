<?php
namespace App\Middleware\Commun;

use Fig\Http\Message\StatusCodeInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class RouteNotFoundMiddleware implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $response = ['message' => 'An unexpected error occurred: URL not found'];
        return new JsonResponse($response, StatusCodeInterface::STATUS_NOT_FOUND);
    }
}


<?php
namespace App\Middleware\Outils\Sum;

use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\JsonResponse;

class SumAction implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $params = $request->getParsedBody();

        $a = isset($params['a']) ? (int) $params['a'] : 0;
        $b = isset($params['b']) ? (int) $params['b'] : 0;

        $response = new JsonResponse([
            'SUM' => $a + $b
        ]);

        // Add some headers
        return $response->withHeader('X-Processed-Timestamp', time())->withAddedHeader('X-Auth', uniqid());
    }
}


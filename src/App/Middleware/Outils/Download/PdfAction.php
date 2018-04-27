<?php
namespace App\Middleware\Outils\Download;

use Fig\Http\Message\StatusCodeInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\Stream;

class PdfAction implements MiddlewareInterface
{

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $file = BE_PATH . '/cache/if-aot-fails.pdf';

        $body = new Stream($file);

        $headers = $this->getHeaders(basename($file), $body->getSize());

        return new Response($body, StatusCodeInterface::STATUS_OK, $headers);
    }

    /**
     * Perpare headers for pdf file download.
     *
     * @param string $filename File name only.
     * @param int $size file size.
     *
     * @return array
     */
    protected function getHeaders($filename, $size)
    {
        return [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename=' . $filename,
            'Content-Transfer-Encoding' => 'Binary',
            'Expires' => 0,
            'Content-Description' => 'File Transfer',
            'Pragma' => 'public',
            'Cache-Control' => 'must-revalidate',
            'Content-Length' => $size
        ];
    }
}

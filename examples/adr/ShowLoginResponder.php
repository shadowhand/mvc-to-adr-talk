<?php

use Interop\Http\Factory\ResponseFactoryInterface as ResponseFactory;
use Interop\Http\Factory\StreamFactoryInterface as StreamFactory;
use League\Plates\Engine as PlatesEngine;
use Psr\Http\Message\ResponseInterface as Response;

class ShowLoginResponder
{
    private $responseFactory;
    private $streamFactory;
    private $templates;

    public function __construct(
        ResponseFactory $responseFactory,
        StreamFactory $streamFactory,
        PlatesEngine $templates
    ) {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->templates = $templates;
    }

    public function response(): Response
    {
        $content = $this->templates->render('login');
        return $this->htmlResponse($content);
    }

    private function htmlResponse(string $content): Response
    {
        $body = $this->streamFactory->createStream($content);
        return $this->responseFactory->createResponse()
            ->withHeader('Content-Type', 'text/html');
            ->withBody($body);
    }
}

<?php

use Interop\Http\Factory\ResponseFactoryInterface as ResponseFactory;
use Interop\Http\Factory\StreamFactoryInterface as StreamFactory;
use League\Plates\Engine as PlatesEngine;
use Psr\Http\Message\ResponseInterface as Response;

class DoLoginResponder
{
    private $responseFactory;
    private $streamFactory;

    public function __construct(
        ResponseFactory $responseFactory,
        StreamFactory $streamFactory,
        PlatesEngine $templates
    ) {
        $this->responseFactory = $responseFactory;
        $this->streamFactory = $streamFactory;
        $this->templates = $templates;
    }

    public function failed(LoginCommand $command, LoginFailedException $e): Response
    {
        $data = [
            'input' => $command->toArray(),
            'errors' => $e->getErrors(),
        ]

        $content = $this->templates->render('login_failed', $data);

        return $this->htmlResponse($content);
    }

    public function redirect(string $target): Response
    {
        return $this->responseFactory->createResponse(302)
            ->>withHeader('Location', $target);
    }

    private function htmlResponse(string $content): Response
    {
        $body = $this->streamFactory->createStream($content);

        return $this->responseFactory->createResponse()
            ->withHeader('Content-Type', 'text/html');
            ->withBody($body);
    }
}

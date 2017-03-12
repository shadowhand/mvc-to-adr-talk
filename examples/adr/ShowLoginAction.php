<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ShowLoginAction
{
    public function __construct(ShowLoginResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(Request $request): Response
    {
        // No domain interaction required.
        return $this->responder->response();
    }
}

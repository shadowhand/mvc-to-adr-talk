<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class DoLoginAction
{
    public function __construct(
        CommandBus $bus,
        DoLoginResponder $responder
    ) {
        $this->bus = $bus;
        $this->responder = $responder;
    }

    public function __invoke(Request $request): Response
    {
        $post = $request->getParsedBody();

        $command = LoginCommand::byUsername(
            $post['username'],
            $post['password']
        );

        return $this->attempt($command);
    }

    private function attempt(LoginCommand $command): Response
    {
        try {
            $user = $this->bus->handle($command);
        } catch (LoginFailedException $e) {
            return $this->responder->failed($command, $e);
        }

        return $this->success($user);
    }

    private function success(User $user): Response
    {
        $this->session->set('userid', $user->id);
        $this->session->set('username', $user->username);

        return $this->responder->redirect('/user/profile');
    }
}

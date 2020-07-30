<?php


namespace Api\Http\Action\Auth\SignUp;


use Api\Model\User\UseCase\SignUp\Request\Command;
use Api\Model\User\UseCase\SignUp\Request\Handler;
use Api\Http\ValidationException;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Api\Http\Validator\Validator;

class RequestAction implements RequestHandlerInterface
{

    private $handler;

    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $command = $this->deserialize($request);

//        if ($errors = $this->validator->validate($command)) {
//            throw new ValidationException($errors);
//        }

        $this->handler->handle($command);

        return new JsonResponse([
            'email' => $command->email,
        ], 201);
    }

    private function deserialize(ServerRequestInterface $request): Command
    {
        $body = $request->getParsedBody();

        $command = new Command();

        $command->email = $body['email'] ?? '';
        $command->password = $body['password'] ?? '';

        return $command;
    }
}
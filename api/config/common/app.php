<?php

declare(strict_types=1);

use Api\Http\Action\Auth\SignUp\RequestAction;
use Api\Http\Action\HomeAction;
use Api\Http\Validator\Validator;
use Api\Model\User\UseCase\SignUp\Request\Handler;
use Psr\Container\ContainerInterface;

return [
    HomeAction::class => function () {
        return new HomeAction();
    },
    RequestAction::class => function (ContainerInterface $container) {
        return new RequestAction(
            $container->get(Handler::class),
        );
    }
];
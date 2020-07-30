<?php

declare(strict_types=1);

use Api\Http\Action\Auth\SignUp\RequestAction;
use Api\Http\Action\HomeAction;
use Api\Http\Middleware\DomainExceptionMiddleware;
use Psr\Container\ContainerInterface;
use Api\Infrastructure\Framework\Middleware\CallableMiddlewareAdapter as CM;
use Slim\App;

return function (App $app, ContainerInterface $container) {

    $app->add(new CM($container, DomainExceptionMiddleware::class));

    $app->get('/', HomeAction::class . ':handle');

    $app->post('/auth/signup', RequestAction::class . ':handle');
};

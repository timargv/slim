<?php

declare(strict_types=1);

namespace Api\Test\Feature;

use Laminas\Diactoros\Stream;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Uri;

class WebTestCase extends TestCase
{
    protected function get(string $uri) : ResponseInterface
    {
        return $this->method($uri, 'GET');
    }

    public function post(string $uri, array $params = []) : ResponseInterface
    {
        return $this->method($uri, 'POST', $params);
    }

    protected function method(string $uri, string $method, array $params = []) : ResponseInterface
    {
        $body = new Stream('php://temp', 'r+');
        $body->write(json_encode($params));
        $body->rewind();

        return $this->request(
            (new ServerRequest())
                ->withHeader('Content-Type', 'application/json')
                ->withHeader('Accept', 'application/json')
                ->withUri(new Uri('http://test', $uri))
                ->withMethod($method)
                ->withBody($body)
        );
    }

    protected function request(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->app()->process($request, new Response());
        $request->getBody()->rewind();
        return $response;
    }


    private function app() : App
    {
        $container = $this->container();
        $app = new \Slim\App($container);
        (require 'config/routes.php')($app);
        return $app;
    }

    private function container() : ContainerInterface
    {
        return require 'config/container.php';
    }

}
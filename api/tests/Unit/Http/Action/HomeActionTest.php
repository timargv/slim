<?php


namespace Api\Test\Unit\Http\Action;

use Api\Http\Action\HomeAction;
use Api\Test\Feature\WebTestCase;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Http\Response;
use Slim\Http\Uri;
use Zend\Diactoros\ServerRequest;

class HomeActionTest extends WebTestCase
{

    public function testSuccess(): void
    {
        $response = $this->get('/');

        self::assertEquals(200, $response->getStatusCode());
        self::assertJson($content = $response->getBody()->getContents());

        $data = json_decode($content, true);

        self::assertEquals([
            'name' => 'App API',
            'version' => '1.0',
        ], $data);
    }




}
<?php

use App\Service\Auth;
use App\Service\View;
use Middlewares\TrailingSlash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(View::r('index'));
    return $response;
});

$app->get('/test/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('test ok');
    return $response;
});

$app->post('/api/v1/', function (Request $request, Response $response, $args) {
    $response->getBody()->write(json_encode([]));
    return $response->withHeader('Content-Type', 'application/json');
})->add(new Auth());

$app->add(new TrailingSlash(true));

$app->run();
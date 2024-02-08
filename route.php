<?php
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

$app->add(new TrailingSlash(true));

$app->run();
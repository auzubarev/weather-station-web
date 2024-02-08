<?php



namespace App\Service;


use Slim\Psr7\Response;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Auth {


    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $auth = explode(':',$request->getHeaderLine('Authorization'));
        if(count($auth) !== 2 || trim($auth[0]) !== 'Base' || trim($auth[1]) !== base64_encode(ADMIN_TOKEN)) {
            $response = new Response();
            $response->getBody()->write(json_encode(['error' => 'Forbidden']));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(403);
        }
        return $handler->handle($request);
    }


}
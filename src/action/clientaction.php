<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientAction
{

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {
        $response->getBody()->write("Seja bem vindo ao Wiki de Naruto!");
        return $response;
    }

}

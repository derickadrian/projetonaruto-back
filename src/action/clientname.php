<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ClientName
{
                            //envio do usuário....          resposta que a API envia para o usuário
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {

        //buscando o payload....
        $data = $request->getParsedBody(); //buscando valores enviados pelo usuário

        $name = strtoupper($data['name']);
        $hability = strtoupper($data['hability']);
        $height = strtoupper($data['height']);
        $age = strtoupper($data['age']);

        // $response->getBody()->write("Hello ".$data['name']);
        $response->getBody()->write("The name of the character is $name. His(Her) hability is $ability, His(Her) heigth is $height and His(Her) age is $age years old. ");
        return $response;
    }

}

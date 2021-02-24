<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CalculatorAction
{
                            //envio do usuário....          resposta que a API envia para o usuário
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {

        //buscando o payload....
        $data = $request->getParsedBody(); //buscando valores enviados pelo usuário

        $number1 = strtoupper($data['number1']);
        $number2 = strtoupper($data['number2']);

        //chamando o model
        $calculator = new \App\Model\Calculator();

        $calculator->number1 = $number1;
        $calculator->number2 = $number2;

        // $response->getBody()->write("Hello ".$data['name']);
        $response->getBody()->write("The sum is ".$calculator->sum());

        //chamando o toString
        // $response->getBody()->write("The sum is $calculator");
        return $response;
    }

}

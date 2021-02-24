<?php
namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
    ): ResponseInterface {
      $response->getBody()->write(json_encode(['success' => true]));

      return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
      // 200 - ok
      // 201 - created
      // 401 - não autorizado
      // 404 - não encontrado...
    }
}



 ?>

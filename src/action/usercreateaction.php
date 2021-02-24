<?php
namespace App\Action;

use App\Domain\User\Service\UserCreator;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserCreateAction
{
  private $userCreator;
  public function __construct(UserCreator $userCreator)
  {
    $this->userCreator = $userCreator;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
    ): ResponseInterface {
      $data = (array) $request->getParsedBody();

      $userId = $this->userCreator->createUser($data);

      $result = [
        'user_id' => $userId
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(201);
    }
}
 ?>

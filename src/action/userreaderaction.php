<?php
namespace App\Action;

use App\Domain\User\Service\UserReader;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserReaderAction
{
  private $userReader;
  public function __construct(UserReader $userReader)
  {
    $this->userReader = $userReader;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args = []
    ): ResponseInterface {

      $userId = (int) $args['id'];

      $user = $this->userReader->getUserById($userId);

      $result = [
        'user_id' => $user->id,
        'name' => $user->name,
        'hability' => $user->hability,
        'height' => $user->height,
        'age' => $user->age,
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
    }
}
 ?>

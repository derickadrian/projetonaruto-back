<?php
namespace App\Action;

use App\Domain\User\Service\UserUpdate;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserUpdateAction
{
  private $userUpdate;
  public function __construct(UserUpdate $userUpdate)
  {
    $this->userUpdate = $userUpdate;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
    ): ResponseInterface {
      $data = (array) $request->getParsedBody();

      $rowCount = $this->userUpdate->updateUser($data);

      $result = [
        'success' => $rowCount == 1 ? true : false
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(202);
    }
}
 ?>

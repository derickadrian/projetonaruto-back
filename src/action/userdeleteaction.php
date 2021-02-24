<?php
namespace App\Action;

use App\Domain\User\Service\UserDelete;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserDeleteAction
{
  private $userDelete;
  public function __construct(UserDelete $userDelete)
  {
    $this->userDelete = $userDelete;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response,
    array $args = []
    ): ResponseInterface {

      $userId = (int) $args['id'];

      $rowCount = $this->userDelete->deleteById($userId);

      $result = [
        'success' => $rowCount == 1 ? true : false
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
    }
}
 ?>

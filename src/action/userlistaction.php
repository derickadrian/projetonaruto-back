<?php
namespace App\Action;

use App\Domain\User\Service\UserList;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserListAction
{
  private $userList;
  public function __construct(UserList $userList)
  {
    $this->userList = $userList;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
    ): ResponseInterface {

      $users = $this->userList->findAll();

      $result = [
        'users' => $users
      ];

      $response->getBody()->write((string)json_encode($result));

      return $response
      ->withHeader('Content-Type', 'application/json')
      ->withStatus(200);
    }
}
 ?>

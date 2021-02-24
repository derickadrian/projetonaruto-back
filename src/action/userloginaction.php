<?php
namespace App\Action;

use App\Domain\User\Service\UserLogin;
use Psr\Http\message\ResponseInterface;
use Psr\Http\message\ServerRequestInterface;

final class UserLoginAction
{
  private $userLogin;
  public function __construct(UserLogin $userLogin)
  {
    $this->userLogin = $userLogin;
  }

  public function __invoke(
    ServerRequestInterface $request,
    ResponseInterface $response
    ): ResponseInterface {
      $data = (array) $request->getParsedBody();

      $row = $this->userLogin->loginUser($data);

      $result = [
        'success' => $row == 1 ? true : false
      ];

      $response->getBody()->write((string)json_encode($result));

      if($row) {
        return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(200);
      }
      return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(401);
    }
}
 ?>

<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserLoginRepository;
use App\Exception\ValidationException;

final class UserLogin
{
  /**
  *@var UserLoginRepository
  */
  private $repository;

  /**
  *
  *
  *@param UserLoginRepository
  */
  public function __construct(UserLoginRepository $repository)
  {
    $this->repository = $repository;
  }
  /**
  *
  *@param array
  *
  *@return int
  */
  public function loginUser(array $data): int
  {
    $this->validateNewUser($data);

    return $this->repository->loginUser($data);
  }
  /**
  *
  *@param array
  *
  *@throws ValidationException
  *
  *@return void
  */

  private function validateNewUser(array $data): void
  {
    $errors = [];
    if(empty($data['name'])) {
      $errors['name'] = 'Precisa digitar o Nome';
    }
    if(empty($data['hability'])) {
      $errors['name'] = 'Precisa digitar a habilidade';
    }else if(filter_var($data['hability'], FILTER_VALIDATE_HABILITY) === false) {
      $errors['hability'] = 'habilidade inválida!';
    }

    if($errors) {
      throw new ValidationException('Por favor, verifique os dados digitados'.$errors);
    }
  }
}
 ?>

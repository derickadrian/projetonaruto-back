<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserCreatorRepository;
use App\Exception\ValidationException;

final class UserCreator
{
  private $repository;

  public function __construct(UserCreatorRepository $repository)
  {
    $this->repository = $repository;
  }
  public function createUser(array $data): int
  {
    $this->validateNewUser($data);

    $userId = $this->repository->insertUser($data);

    return $userId;
  }

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

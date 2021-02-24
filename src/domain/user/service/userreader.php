<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserReaderRepository;
use App\Domain\User\Model\User;
use App\Exception\ValidationException;

final class UserReader
{
  private $repository;

  public function __construct(UserReaderRepository $repository)
  {
    $this->repository = $repository;
  }
  public function getUserById(int $userId): user
  {
    if(empty($userId)){
      throw new ValidationException('código do personagem requirido!');
    }

    $user = $this->repository->getUserById($userId);

    return $user;
  }

}
 ?>

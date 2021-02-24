<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserDeleteRepository;
use App\Domain\User\Model\User;
use App\Exception\ValidationException;

final class UserDelete
{
  private $repository;

  public function __construct(UserDeleteRepository $repository)
  {
    $this->repository = $repository;
  }
  public function deleteById(int $userId): int
  {
    if(empty($userId)){
      throw new ValidationException('código do personagem requirido!');
    }

    $rowCount = $this->repository->deleteById($userId);

    return $rowCount;
  }

}
 ?>

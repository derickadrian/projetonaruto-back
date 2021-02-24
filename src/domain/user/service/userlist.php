<?php
namespace App\Domain\User\Service;

use App\Domain\User\Repository\UserListRepository;

final class UserList
{
  private $repository;

  public function __construct(UserListRepository $repository)
  {
    $this->repository = $repository;
  }
  public function findAll()
  {
    $users = $this->repository->findAll();

    return $users;
  }

}
 ?>

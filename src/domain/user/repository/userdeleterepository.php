<?php
namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\User;
use DomainException;

class UserDeleteRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function deleteById(int $userId): int
  {
    $sql = "DELETE from naruto WHERE id = :id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $userId]);

    return (int) $statement->rowCount();
  }
}
 ?>

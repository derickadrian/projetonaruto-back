<?php
namespace App\Domain\User\Repository;

use PDO;

class UserLoginRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function loginUser(array $user): int
  {
    $row = [
      'name' => $user['name'],
      'hability' => $user['hability'],
    ];

    $sql = "SELECT count(*) FROM naruto
            where name=:name and hability=:hability;";

    $statement = $this->connection->prepare($sql);
    $statement->execute($row);

    return (int) $statement->fetchColumn();
  }
}
 ?>

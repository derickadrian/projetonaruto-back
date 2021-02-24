<?php
namespace App\Domain\User\Repository;

use PDO;

class UserCreatorRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function insertUser(array $user): int
  {
    $row = [
      'name' => $user['name'],
      'hability' => $user['hability'],
      'height' => $user['height'],
      'age' => $user['age']
    ];

    $sql = "INSERT INTO naruto SET
            name=:name,
            hability=:hability,
            height=:height,
          	age=:age;";

    $this->connection->prepare($sql)->execute($row);

    return (int) $this->connection->lastInsertId();
  }
}
 ?>

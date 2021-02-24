<?php
namespace App\Domain\User\Repository;

use PDO;

class UserUpdateRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function updateUser(array $user): int
  {
    $row = [
      'id' => $user['id'],
      'name' => $user['name'],
      'hability' => $user['hability'],
      'height' => $user['height'],
      'age' => $user['age'],
    ];

    $sql = "UPDATE naruto SET
            name=:name,
            hability=:hability,
            height=:height,
            age=:age
            WHERE id=:id;";

    $statement = $this->connection->prepare($sql);
    $statement->execute($row);

    return (int) $statement->rowCount();
  }
}
 ?>

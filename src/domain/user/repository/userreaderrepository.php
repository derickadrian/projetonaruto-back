<?php
namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\User;
use DomainException;

class UserReaderRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }
  public function getUserById(int $userId): User
  {
    $sql = "SELECT id, name, hability, height, age FROM naruto WHERE id = :id;";
    $statement = $this->connection->prepare($sql);
    $statement->execute(['id' => $userId]);

    $row = $statement->fetch();

    // if(!$row){
    //   throw new DomainException(sprintf('Personagem não encontrado: %s', $userId));
    // }

      $user = new User();
      $user->id = (int) $row['id'];
      $user->name = (string) $row['name'];
      $user->hability = (string) $row['hability'];
      $user->height = (double) $row['height'];
      $user->age = (int) $row['age'];

      return $user;

  }
}
 ?>

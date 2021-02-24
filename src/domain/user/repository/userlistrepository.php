<?php
namespace App\Domain\User\Repository;

use PDO;
use App\Domain\User\Model\User;

class UserListRepository
{
  private $connection;

  public function __construct(PDO $connection)
  {
    $this->connection = $connection;
  }

  public function FindAll()
  {
    $sql = "SELECT id, name, hability, height, age FROM naruto;";

    $statement = $this->connection->prepare($sql);
    $statement->execute();

    $rows = $statement->fetchAll();

    //Galho...
    $users = [];
    foreach($rows as $row){
      $user = new User();
      $user->id = (int) $row['id'];
      $user->name = (string) $row['name'];
      $user->hability = (string) $row['hability'];
      $user->height = (string) $row['height'];
      $user->age = (string) $row['age'];

      $users[] = $user;
    }
    return $users;
  }
}
 ?>

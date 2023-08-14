<?php
namespace App\Constracts\Repositories\Acl\User;

interface UserInterface {
  public function getUserListing();
  public function createUser(array $data);
  public function getByUserId($id);
  public function updateUser($id, array $data);
  public function changePassword($id, array $data);
}
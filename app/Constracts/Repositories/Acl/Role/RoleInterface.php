<?php

namespace App\Constracts\Repositories\Acl\Role;

interface RoleInterface {        	
  public function getRolesListing();
  public function getRoleDropDown();
  public function createRoles(array $data);  
  public function getByRoleId($id);  
  public function updateRoles($id, array $data);
  public function getPermissionListing();
  public function createPermissions(array $data);
  public function getByPermissionId($id);
  public function updatePermissions($id, array $data);
}
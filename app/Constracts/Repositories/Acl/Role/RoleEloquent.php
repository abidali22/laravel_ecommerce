<?php

namespace App\Constracts\Repositories\Acl\Role;

use App\Constracts\Repositories\Acl\Role\RoleInterface;
use App\Models\Acl\Role;
use App\Models\Acl\Permission;

class RoleEloquent implements RoleInterface {

    protected $rolesObj;
    protected $permiObj;
    
    function __construct(Role $rolesModel, Permission $permissionModel) {
        $this->rolesObj = $rolesModel; 
        $this->permiObj = $permissionModel;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Get Roles list
    * Controller     RolesController
    * @return        mix
    */
    public function getRolesListing()
    { 
        $query = $this->rolesObj;
        if(\Auth::user()->id != 1){
            $query = $query->where('id','>',1);
        }
        return $query->orderBy('id', 'desc')
        ->get();
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Get roles for drop down
    * Controller     UserController
    * @return        array
    */
    public function getRoleDropDown(){
        $dd = [ '' => '-- None --'];
        $query = $this->rolesObj;
        if(\Auth::user()->id != 1){
            $query = $query->where('id','>',1);
        }
        $roleList = $query->pluck('name', 'id')->toArray();
        if (is_array($roleList)) {
            $dd += $roleList;
        }
        return $dd;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Save new role record
    * Controller     RoleController
    * @param         array
    * @return        mix
    */
    public function createRoles(array $data) {
        return $this->rolesObj->create($data);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Get by role id
    * Controller     RoleController
    * @param         int
    * @return        mix
    */
    public function getByRoleId($id) { 
        return $this->rolesObj->findOrFail($id);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Update role
    * Controller     RoleController
    * @param         int, array
    * @return        mix     
    */
    public function updateRoles($id, array $data) {
        return $this->rolesObj->find($id)->update($data);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Get permission listing
    * Controller     PermissionController
    * @return        mix
    */
    public function getPermissionListing(){ 
        return $this->permiObj->orderBy('id', 'desc')->get();
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Create permissions
    * Controller     PermissionController
    * @param         array
    * @return        mix
    */
    public function createPermissions(array $data){
        return $this->permiObj->create($data);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Get by permission id
    * Controller     PermissionController
    * @param         int
    * @return        mix
    */
    public function getByPermissionId($id){
        return $this->permiObj->findOrFail($id);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Update permissions record
    * Controller     PermissionController
    * @param         int, array
    * @return        mix
    */
    public function updatePermissions($id, array $data){ 
        return $this->permiObj->find($id)->update($data);
    }
}
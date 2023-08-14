<?php

namespace App\Constracts\Repositories\Category;

use App\Constracts\Repositories\Category\CategoryInterface;
use App\Models\Category;

class CategoryEloquent implements CategoryInterface {

    protected $categoryObj;

    function __construct(Category $categoryModel) {
        $this->categoryObj = $categoryModel;
    }
    
    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         get users list 
    * Controller     UserController
    * @return        mix
    */
    public function getCategoryList(){ 
        // $query = $this->categoryObj;
        // if(\Auth::user()->id != 1){
        //     $query = $query->where('users.id','>',1);
        // }
        // $data = $query
            $categories = $this->categoryObj->orderBy('name', 'desc')->paginate(5);
        return $categories;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Save user with assign role
    * Controller     UserController
    * @param         array
    * @return        mix
    */
    public function createUser(array $data){ 
        
        $create = $this->userObj->create($data);
        return $create->attachRole($data['role_id']);
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         get user by id
    * Controller     UserController
    * @param         int
    * @return        mix
    */
    public function getByUserId($id) { 
        return $this->userObj
        ->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
        ->select('users.id','users.name as uName','users.email','users.tps','users.tpsd','users.tped', 'roles.id as role_id','roles.name')
        ->where('users.id', $id)
        ->first();
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Update User record by user id,
    * Controller     UserController
    * @param         int, array
    * @return        mix
    */
    public function updateUser($id, array $data){    
        $record = $this->userObj::findOrFail($id);

        if ($this->userObj->find($id)->update($data)) {
            \DB::table('role_user')->where('user_id',$id)->delete();
            $record->attachRole($data['role_id']);
        }
        return $record;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         change user passwrod
    * Controller     UserController
    * @param         int, array
    * @return        mix
    */
    public function changePassword($id, array $data){
        return $this->userObj->findOrFail($id)->update($data);
    }

    /** 
    * @author        Abid 
    * date           12-04-2022
    * Detail         Get users dropdown
    * Controller     ProjectController
    * @return        array
    */
    public function getUserDropDown(){
        $dd = ['' => '-- None --'];
        $userList = $this->userObj->pluck('name', 'id')->toArray();
        if (is_array($userList)) {
            $dd += $userList;
        }
        return $dd;
    }
}

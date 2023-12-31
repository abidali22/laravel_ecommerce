<?php

namespace App\Constracts\Repositories\Category;

use App\Constracts\Repositories\Category\CategoryInterface;
use App\Models\Category;
use Auth;

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
            $categories = $this->categoryObj->orderBy('name', 'desc')->whereNull('deleted_at')->paginate(5);
        return $categories;
    }

    public function createCategory($data)
    {
      $category = new $this->categoryObj;
      $category->name = $data['name'];
      $category->slug = $data['slug'];
      $category->created_by = Auth::id();
      return $category->save();
    }
    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Save user with assign role
    * Controller     UserController
    * @param         array
    * @return        mix
    */
    public function deleteCategory($categoryId)
    {
      $categoryRow = $this->categoryObj->find($categoryId);
      $categoryRow->deleted_at = date('Y-m-d H:i:s');
      $categoryRow->modified_by = \Auth::id();
      return $categoryRow->save();
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         get user by id
    * Controller     UserController
    * @param         int
    * @return        mix
    */
    public function getCategoryById($id) { 
        $catId = $this->categoryObj->find($id);
        return $catId;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Update User record by user id,
    * Controller     UserController
    * @param         int, array
    * @return        mix
    */
    public function updateCategory($id, array $data){    
      $category = $this->categoryObj->findOrFail($id);
      $category->name = $data['name'];
      $category->slug = $data['slug'];
      $category->modified_by = Auth::id();
      $record = $category->save();
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

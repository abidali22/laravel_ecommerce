<?php

namespace App\Constracts\Repositories\Product;

use App\Constracts\Repositories\Product\ProductInterface;
use App\Models\Product;
use Auth;

class ProductEloquent implements ProductInterface {

    protected $productObj;

    function __construct(Product $productModel) {
        $this->productObj = $productModel;
    }
    
    /** 
    * @author        Abid
    * date           11-01-2021
    * Detail         get users list 
    * Controller     ProductController
    * @return        mix
    */
    public function getProductList(){ 
        $products = $this->productObj->orderBy('name', 'desc')->whereNull('deleted_at')->paginate(5);
        return $products;
    }

    public function createCategory($data)
    {
      $category = new $this->productObj;
      $category->name = $data['name'];
      $category->slug = $data['slug'];
      $category->created_by = Auth::id();
      return $category->save();
    }
    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Save user with assign role
    * Controller     ProductController
    * @param         array
    * @return        mix
    */
    public function deleteCategory($categoryId)
    {
      $categoryRow = $this->productObj->find($categoryId);
      $categoryRow->deleted_at = date('Y-m-d H:i:s');
      $categoryRow->modified_by = \Auth::id();
      return $categoryRow->save();
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         get user by id
    * Controller     ProductController
    * @param         int
    * @return        mix
    */
    public function getCategoryById($id) { 
        $catId = $this->productObj->find($id);
        return $catId;
    }

    /** 
    * @author        Abid 
    * date           11-01-2021
    * Detail         Update User record by user id,
    * Controller     ProductController
    * @param         int, array
    * @return        mix
    */
    public function updateCategory($id, array $data){    
      $category = $this->productObj->findOrFail($id);
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
    * Controller     ProductController
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

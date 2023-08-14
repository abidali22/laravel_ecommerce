<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Constracts\Repositories\Category\CategoryInterface;
// use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    protected $categoryObj;
    public function __construct(CategoryInterface $categoryObj)
    {
        $this->middleware('auth');
        $this->middleware('authadmin');
        $this->categoryObj = $categoryObj;
    }

    public function dashboard()
    {
        // dd(route('admin::category.store'));
        return view('dashboard.admin_dashboard');
    }

    public function index()
    {
        // $categories = Category::orderBy('name', 'desc')->paginate(5);
        $categories = $this->categoryObj->getCategoryList();
        return view('dashboard.categories',['categories'=>$categories]);
    }

    public function create()
    {
        return view('dashboard.add_category');
    }

    public function store(CategoryRequest $request)
    {
      $data = $request->only([
        'name',
        'slug'
      ]);
      $category = new Category();
      $category->name = $data['name'];
      $category->slug = $data['slug'];
      $category->created_by = Auth::id();
      $category->save();
      return redirect()->route('admin::category.create')->with('success', 'Category save successfuly!');
    }

    public function edit($id)
    {
        $catId = Category::find($id);
        return view('dashboard.edit_category')
                    ->with('categoryRow',$catId);
    }

    public function update($id, CategoryRequest $request)
    {
      $data = $request->only([
        'name',
        'slug'
      ]);
      $category = new Category();
      $category->name = $data['name'];
      $category->slug = $data['slug'];
      $category->modified_by = Auth::id();
      $category->save();
      return redirect()->route('admin::category.index')->with('success', 'Category update successfuly!');
    }

    public function show($id)
    {
        dd('show function in controller');
        $catId = Category::find($id);
        return view('dashboard.edit_category');
    }

    public function destroy($id)
    {
        dd('destroy function');
        $catId = Category::find($id);
        return view('dashboard.edit_category');
    }
}

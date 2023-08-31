<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Constracts\Repositories\Product\ProductInterface;

class ProductController extends Controller
{
    protected $productEloq;
    
    public function __construct(ProductInterface $productEloq)
    {
      $this->middleware('auth');
      $this->middleware('authadmin');
      $this->productEloq = $productEloq;
    }

    public function index()
    {
      $products = $this->productEloq->getProductList();
      return view('dashboard.product_index',['products'=>$products]);
    }

    public function create()
    {
      return view('dashboard.add_product');
    }

    public function store(ProductRequest $request)
    {
      $data = $request->only([
        'name',
        'slug'
      ]);
      $this->productEloq->createProduct($data);
      return redirect()->route('admin::product.create')->with('success', 'Product save successfuly!');
    }

    public function edit($id)
    {
        $catId = $this->productEloq->getProductById($id);
        return view('dashboard.edit_product')
                    ->with('productRow',$catId);
    }

    public function update($id, ProductRequest $request)
    {
      $data = $request->only([
        'name',
        'slug'
      ]);
      if ($this->productEloq->updateProduct($id, $data)) {
          return redirect()->route('admin::product.index')->with('success', 'Product update successfuly!');
      }
    }

    public function show($id)
    {
        dd('show function in controller');
        $catId = Product::find($id);
        return view('dashboard.edit_product');
    }

    public function destroy($id)
    {
      if ($this->productEloq->deleteProduct($id)) {
        return true;
      } else {
        return false;
      }
    }
}

<?php

namespace App\Http\Controllers\Product;

use App\Category;
use App\Http\Controllers\ApiController;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends ApiController
{
    public function __construct()
    {
       
        $this->middleware('client.credentials')->only(['index']);
        $this->middleware('auth:api')->except(['index']);
        $this->middleware('scope:manage-products')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        //
        $categories = $product->categories;

        return $this->showAll($categories);
    }

    public function update(Request $request,Product $product,Category $category)
    {
        $product->categories()->syncWithoutDetaching([$category->id]);

        return $this->showAll($product->categories);
    }

    public function destroy(Product $product ,Category $category)
    {
        if(!$product->categories()->find($category->id))
        {
            return $this->errorResponse('The specified category is not a category of this product',404);
        }

        $product->categories()->detach($category->id);

        return  $this->showAll($product->categories);
    }


     public function store(Request $request,Product $product ,Category $category)
    {
        # code...
        
    }

   
}

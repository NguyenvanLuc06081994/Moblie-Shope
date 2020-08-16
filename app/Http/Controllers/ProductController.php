<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $products = $this->productService->getAll();
        return view('product.list',compact('products'));
    }

    public function showFormAdd()
    {
        $categories = $this->categoryService->getAll();
        return view('product.add',compact('categories'));
    }

    public function addProduct(Request $request)
    {
        $this->productService->addProduct($request);
        return redirect()->route('products.list');
    }


}

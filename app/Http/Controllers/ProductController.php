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
        return view('product.list', compact('products'));
    }

    public function showFormAdd()
    {
        $categories = $this->categoryService->getAll();
        return view('product.add', compact('categories'));
    }

    public function addProduct(Request $request)
    {
        $this->productService->addProduct($request);
        return redirect()->route('products.list');
    }

    public function showFormEdit($id)
    {
        $product = $this->productService->findProductById($id);
        $categories = $this->categoryService->getAll();
        return view('product.edit', compact('categories', 'product'));
    }

    public function edit(Request $request, $id)
    {
        $this->productService->edit($request, $id);
        return redirect()->route('products.list');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('products.list');
    }

}

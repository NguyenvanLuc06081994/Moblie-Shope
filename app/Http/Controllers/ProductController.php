<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Product;
use Illuminate\Support\Facades\Gate;
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

    public function getAllFont()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('shop.index',compact('products','categories'));
    }

    public function showFormAdd()
    {
       if(!Gate::allows('crud')){
            abort(403);
       }
        $categories = $this->categoryService->getAll();
        return view('product.add', compact('categories'));
    }

    public function addProduct(Request $request)
    {
        if(!Gate::allows('crud')){
            abort(403);
        }
        $this->productService->addProduct($request);
        return redirect()->route('products.list');
    }

    public function showFormEdit($id)
    {
        if(!Gate::allows('crud') || !Gate::allows('update')){
            abort(403);
        }
        $product = $this->productService->findProductById($id);
        $categories = $this->categoryService->getAll();
        return view('product.edit', compact('categories', 'product'));
    }

    public function edit(Request $request, $id)
    {
        if(!Gate::allows('crud')){
            abort(403);
        }
        $this->productService->edit($request, $id);
        return redirect()->route('products.list');
    }

    public function delete($id)
    {
        if(!Gate::allows('crud')){
            abort(403);
        }
        $this->productService->delete($id);
        return redirect()->route('products.list');
    }

    public function detail($id)
    {
        $product = $this->productService->findProductById($id);
        return view('shop.product',compact('product'));
    }

    public function getCategoriesToHeader()
    {
        $categories = $this->categoryService->getAll();
        return view('masterFont.header', compact('categories'));
    }

    public function getProductsByCategory($id)
    {
        $categories = $this->categoryService->getAll();
        $products = Product::where('category_id',$id)->get();
        return view('shop.index',compact('products','categories'));
    }

}

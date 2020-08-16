<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('category.list', compact('categories'));
    }

    public function showFormAdd()
    {
        return view('category.add');
    }

    public function addCategory(Request $request)
    {
        $this->categoryService->addCategory($request);
        return redirect()->route('categories.list');
    }

    public function showFormEdit($id)
    {
        $category = $this->categoryService->findCategoryById($id);
        return view('category.edit', compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $this->categoryService->edit($request, $id);
        return redirect()->route('categories.list');
    }
}

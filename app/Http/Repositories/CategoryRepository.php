<?php


namespace App\Http\Repositories;


use App\Category;

class CategoryRepository
{
    protected  $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function save($category)
    {
        $category->save();
    }

    public function findCategoryById($id)
    {
        return $this->category->findOrFail($id);
    }
}

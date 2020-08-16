<?php


namespace App\Http\Repositories;


use App\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function save($product)
    {
        $product->save();
    }

    public function findProductById($id)
    {
        return $this->product->findOrFail($id);
    }

    public function delete($product)
    {
        $product->delete();
    }
}

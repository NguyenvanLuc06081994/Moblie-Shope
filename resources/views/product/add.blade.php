@extends('menu.master')
@section('title','Form Add Product')
@section('content')
    <form method="post" action="{{route('products.addProduct')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="name" placeholder="Product Name" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" class="form-control" name="price" placeholder="Product Price" required>
        </div>
        <div class="form-group">
            <label>Product Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Product Quantity" required>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <br>
            <textarea rows="3" cols="140" name="description"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" >
                @foreach($categories as $key => $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection



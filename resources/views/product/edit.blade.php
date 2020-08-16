@extends('menu.master')
@section('title','Form Edit Product')
@section('content')
    <form method="post" action="{{route('products.edit',$product->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
        </div>
        <div class="form-group">
            <label>Product Quantity</label>
            <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}" required>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <br>
            <textarea rows="3" cols="140" name="description">{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" id="">
                @foreach($categories as $key => $category)
                    <option @if($product->category_id == $category->id) {{'selected'}} @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Product Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection


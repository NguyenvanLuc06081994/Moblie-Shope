@extends('menu.master')
@section('title','Form Add Category')
@section('content')
    <form method="post" action="{{route('categories.addCategory')}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Vendor</label>
            <input type="text" class="form-control" name="vendor" placeholder="Category Vendor">
        </div>
        <div class="form-group">
            <input type="submit" value="ADD" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection



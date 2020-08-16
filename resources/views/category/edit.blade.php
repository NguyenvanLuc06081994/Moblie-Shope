@extends('menu.master')
@section('title','Form Edit Category')
@section('content')
    <form method="post" action="{{route('categories.edit',$category->id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Name</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Category Vendor</label>
            <input type="text" class="form-control" name="vendor" value="{{$category->vendor}}">
        </div>

        <div class="form-group">
            <input type="submit" value="UPDATE" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection

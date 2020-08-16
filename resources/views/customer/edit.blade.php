@extends('menu.master')
@section('title','Form Edit Customer')
@section('content')
    <form method="post" action="{{route('customers.edit',$customer->id)}}">
        @csrf
        <div class="form-group">
            <label>Customer's Name</label>
            <input type="text" class="form-control" name="name" value="{{$customer->name}}" placeholder="Customer's Name" required>
        </div>
        <div class="form-group">
            <label>Customer's Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$customer->phone}}" placeholder="Customer's Phone" required>
        </div>
        <div class="form-group">
            <label>Customer's Email</label>
            <input type="email" class="form-control" name="email" value="{{$customer->email}}" placeholder="Customer's Email" required>
        </div>
        <div class="form-group">
            <label>Customer's Address</label>
            <input type="text" class="form-control" name="address" value="{{$customer->address}}" placeholder="Customer's Address" required>
        </div>
        <div class="form-group">
            <input type="submit" value="UPDATE" class="btn btn-primary">
            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </form>
@endsection


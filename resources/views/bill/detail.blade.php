@extends('menu.master')
@section('title',"Bill List")
@section('content')
    <form action="{{route('bills.update',$bill->id)}}" method="post">
        @csrf
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Phone</th>
            <th scope="col">Customer Email</th>
            <th scope="col">Customer Address</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Total Price</th>
            <th scope="col">Status</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$bill->customer->name}}</td>
            <td>{{$bill->customer->phone}}</td>
            <td>{{$bill->customer->email}}</td>
            <td>{{$bill->customer->address}}</td>
                <td> @foreach($bill->products as $product)- {{$product->name}} <br> @endforeach</td>
                <td> @foreach($bill->products as $product)- {{$product->price}} <br> @endforeach</td>

            <td>{{$bill->totalPrice}}</td>
            <td> <select name="status" id="">
                    <option value="{{$bill->status}}"> {{$bill->status}}</option>
                    <option @if($bill->status == \App\Http\Controllers\BillStatus::Shipping) selected @endif value="{{\App\Http\Controllers\BillStatus::Shipping}}">{{\App\Http\Controllers\BillStatus::Shipping}}</option>
                    <option @if($bill->status == \App\Http\Controllers\BillStatus::Done) selected @endif value="{{\App\Http\Controllers\BillStatus::Done}}">{{\App\Http\Controllers\BillStatus::Done}}</option>

                </select></td>
        </tr>
        </tbody>
    </table>
        <input type="submit" class="btn btn-primary" value="UPDATE STATUS">
    </form>
@endsection

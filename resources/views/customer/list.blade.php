@extends('menu.master')
@section('title','List Customer')
@section('content')
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($customers as $key => $customer)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$customer->name}}</td>
                <td>{{$customer->phone}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td><a href="" class="btn btn-primary"><i
                            class="fas fa-edit"></i></a></td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection

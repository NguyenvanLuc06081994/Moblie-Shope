@extends('menu.master')
@section('title',"Bill List")
@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Bill ID</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Status</th>

        </tr>
        </thead>
        <tbody>
        @forelse($bills as $key => $bill)
            <tr>
                <th scope="row"><a href="{{route('bills.detail',$bill->id)}}">{{$bill->id}}</a></th>
                <td>{{$bill->customer->name}}</td>
                <td>
                   {{$bill->status}}

                </td>
            </tr>
        @empty
            <tr>
                <td>No Data</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection

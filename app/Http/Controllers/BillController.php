<?php

namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function getAll()
    {
        $bills = Bill::all();
        return view('bill.list',compact('bills'));
    }

    public function showDetail($id)
    {
        $bill = Bill::find($id);
        return view('bill.detail',compact('bill'));
    }

    public function updateBill(Request $request,$id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->status;
        $bill->save();
        return redirect()->route('bills.list');
    }
}

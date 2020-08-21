<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if ($product != null) {
            if (Session::get('Cart') != null) {
                $oldCart = Session::get('Cart');
            } else {
                $oldCart = null;
            }
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            Session::put('Cart', $newCart);
//            toastr()->success('Thêm sản phẩm vào giỏ hàng thành công', 'Success');
            return redirect()->route('shop.list');
        }
    }

    public function getAll()
    {
        return view('shop.cart');
    }

    public function showFormCheckout()
    {
        return view('shop.checkout');
    }

    public function payment(Request $request)
    {
        $customer= new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->save();
        $bill = new Bill();
        $bill->totalPrice = Session::get('Cart')->totalPrice;
        $bill->note = $request->note;
        $bill->dateBuy = $request->dateBuy;
        $bill->customer_id = $customer->id;
        $bill->save();
        foreach (Session::get('Cart')->products as $product){
            $bill->products()->sync($product['productInfo']->id);
        }
        Session::forget('Cart');
        return redirect()->route('shop.list');
    }

    public function deleteProduct($id)
    {
        $oldCart = Session::get('Cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);

        if (count($newCart->products)>0){
            Session::put('Cart',$newCart);
        }else{
            Session::forget('Cart');
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Cart;
use App\Category;
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
            $data = [
                'productUpdate' => Session::get('Cart')->products[$id],

                'totalPriceCart' => Session::get('Cart')->totalPrice,

                'totalQuantity'=>Session::get('Cart')->totalQuantity
            ];

            return response()->json($data);
        }
    }

    public function getAll()
    {
        $categories = Category::all();
        return view('shop.cart',compact('categories'));
    }

    public function showFormCheckout()
    {
        $categories = Category::all();
        return view('shop.checkout',compact('categories'));
    }

    public function payment(Request $request)
    {
        $customer = new Customer();
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
        $productId = [];
        foreach (Session::get('Cart')->products as $product) {
            array_push($productId,$product['productInfo']->id);
        }
        $bill->products()->sync($productId);
        Session::forget('Cart');
        return redirect()->route('shop.list');
    }

    public function deleteProduct($id)
    {
        $oldCart = Session::get('Cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);
        if (count($newCart->products) > 0) {
            Session::put('Cart', $newCart);
            $data = [
                'totalPriceCart' => Session::get('Cart')->totalPrice,

                'totalQuantity'=>Session::get('Cart')->totalQuantity
            ];

            return response()->json($data);
        } else {
            Session::forget('Cart');
        }



    }

    public function updateCart(Request $request, $id)
    {
        $quantity = $request->quantity;
        $oldCart = Session::get('Cart');
        $newCart = new Cart($oldCart);
        $newCart->updateCart($id,$quantity);
        Session::put('Cart', $newCart);
        $data = [
            'productUpdate' => Session::get('Cart')->products[$id],

            'totalPriceCart' => Session::get('Cart')->totalPrice,

            'totalQuantity'=>Session::get('Cart')->totalQuantity
        ];

        return response()->json($data);
    }

    public function clearCart()
    {
        Session::forget('Cart');
    }
}

<?php

namespace App\Http\Controllers;

use App\Cart;
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
            return back();
        }
    }

    public function getAll()
    {

//        $cart = Session::get('Cart');
        return view('cart.detail');
    }
}

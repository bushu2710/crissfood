<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;


class OrderController extends Controller
{
    public function checkout(Request $request){

        $userId = $request->user->id;
        $cartData = Cart::where('user_id',"=", $userId)->select('carts.cart_data')->first();
        $products_in_cart = json_decode($cartData->cart_data);
        
        $product_ids = [];

        foreach($products_in_cart as $product){
            $product_ids[] = $product->id;
        }

        $order = new Order();
        $order->user_id = $userId;
        $order->product_ids = implode(",",$product_ids);
        $order->shipping_id = $request->shipping_id;
        $order->billing_id = $request->billing_id;
        $order->delivery_mode = $request->delivery_mode;
        $order->payment_mode = $request->payment_mode;
        $order->per_product_qty = json_encode($products_in_cart);
        $order->total_items = $request->total_items;
        $order->contact = $request->contact;
        $order->vendor_id = $request->vendor_id;
        $order->price = $request->price;
        $order->save();

        $response = [
            'message' => "Order placed successfully",
            'status' => 200
        ];

        return response()->json($response);
    }
}

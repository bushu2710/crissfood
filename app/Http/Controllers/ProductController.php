<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class ProductController extends Controller
{
    public function index(Request $request){

        $products = Product::join('product_details','products.id',"=",'product_details.product_id')
                            ->join('users','products.vendor_id',"=",'users.id')
                            ->select('products.*','product_details.image','product_details.size','product_details.weight','product_details.warranty',
                                    'users.name as vendor_name')
                                    ->get();

        return $products;
    }

    public function addToCart(Request $request){
        
        $userId = $request->user->id;

        $oldCart = Cart::where('user_id', "=", $userId)->first();

        if(empty($oldCart)){

            $cart = new Cart();
            $cart->user_id = $userId;
            
            $cartData = [
                [
                "id" => $request->product_id,           // storing only id so that we can fetch fresh/updated product data whe user will see cart details.
                "qty" => 1
            ]];

            $cart->cart_data = json_encode($cartData);
            $cart->save();

        }

        else{
             $cartData = json_decode($oldCart->cart_data);
            
            $cartData[] = [
                "id" => $request->product_id,
                "qty" => 1
            ];

            $oldCart->cart_data = $cartData;
            $oldCart->update();

        }

        
        $responseData = [
            "message" => "Added to cart",
            "status" => 200
        ];
       
        return response()->json($responseData);
    }
}


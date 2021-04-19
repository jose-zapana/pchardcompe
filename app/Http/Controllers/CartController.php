<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartProduct;
use App\Customer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart( $idProduct )
    {
        // Verificar que haya un carrito del cliente
        $product = Product::find($idProduct);
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cart = Cart::where('customer_id', $customer->id)
            ->where('state', 'on')->first();

        // Si no hay carrito, creamos el carrito y agregamos el producto
        // TODO: Cuando cambiemos la tienda a variable de session
        // TODO: Entonces el 1 se cambiará por la variable
        if ( !isset($cart) )
        {
            $shopping_cart = Cart::create([
                'customer_id' => $customer->id,
                'shop_id' => 1,
                'total' => $product->unit_price,
                'state' => 'on'
            ]);
            CartProduct::create([
                'cart_id' => $shopping_cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'unit_price' => $product->unit_price
            ]);
        } else {
            // Si hay carrito, solo agregamos el producto
            $existProduct = CartProduct::where('product_id', $product->id)
                ->where('cart_id', $cart->id)->first();
            if ( isset($existProduct) )
            {
                return response()->json(['success' => true, 'url' => route('shopping.cart')],200);
            } else {
                $cart->total = $cart->total + $product->unit_price;
                $cart->save();

                CartProduct::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'unit_price' => $product->unit_price
                ]);
            }

        }

        return response()->json(['success' => true, 'url' => route('shopping.cart')],200);

    }
}

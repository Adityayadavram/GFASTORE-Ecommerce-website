<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
// use App\Models\User;

class CartController extends Controller
{
    public function showCart()
    {
        $user = Auth::user(); // Get the currently authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view your cart.');
        }

        // Fetch cart items for the logged-in user only
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        // Ensure the user is logged in
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        // Validate request input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Check if the product already exists in the user's cart
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Update quantity if product is already in cart
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Add new product to cart
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully.');
    }

    public function removeFromCart($cartId)
    {
        $user = Auth::user(); // Get the currently authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to modify your cart.');
        }

        // Find the cart item for the logged-in user
        $cartItem = Cart::where('id', $cartId)->where('user_id', $user->id)->first();

        if (!$cartItem) {
            return redirect()->route('cart.showCart')->with('error', 'Cart item not found.');
        }

        // Delete the cart item
        $cartItem->delete();

        return redirect()->route('cart.show')->with('success', 'Item removed from cart successfully.');
    }
}

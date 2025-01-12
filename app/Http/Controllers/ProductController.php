<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function products(){
        return view('products');
    }

    public function showAll()
    {
        $products = products::all();
        return view('products', compact('products'));
    }

    public function show($id)
{
    // Fetch the product details by ID (only main image for now)
    $product = products::findOrFail($id);

    // Return the view with the product data
    return view('productDis', compact('product'));
}

    

}

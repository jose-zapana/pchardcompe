<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'shop'])->get();

        //dd($products);

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $shops = Shop::all();
        $categories = Category::all();

        return view('product.create', compact('shops', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        //
    }

    public function edit( $id )
    {
        //
    }

    public function update(ProductUpdateRequest $request)
    {
        //
    }

    public function destroy(ProductDeleteRequest $request)
    {
        //
    }
}

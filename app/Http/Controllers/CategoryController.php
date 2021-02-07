<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Shop;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('shop')->get();
        $shops = Shop::get(['id', 'name']);
        //dd($categories);
        return view('category.index', compact('categories', 'shops'));
    }

    public function create()
    {
        // No se utilizará porque es una ventana modal.
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'shop_id' => $request->get('shop')
        ]);

        // TODO: Tratamiento de un archivo de forma tradicional
        if (!$request->file('image')) {
            $category->image = 'no_image.jpg';
            $category->save();
        } else {
            $path = public_path().'/images/category/';
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $category->id . '.' . $extension;
            $request->file('image')->move($path, $filename);
            $category->image = $filename;
            $category->save();
        }

        return response()->json(['message' => 'Categoría guardada con éxito.'], 200);

    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}

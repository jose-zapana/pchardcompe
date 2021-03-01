<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\ProductImage;
use App\ProductInfo;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //var_dump( $request );
        $validated = $request->validated();

        // TODO: Esto debe estar en una transaccion

        DB::beginTransaction();
        try {
            $product = Product::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'stock' => $request->get('stock'),
                'unit_price' => $request->get('unit_price'),
                'shop_id' => $request->get('shop')
            ]);

            $infos = $request->get('infos');
            $specifications = $request->get('specifications');
            $images = $request->file('images');
            $alts = $request->get('alts');

            $categories = $request->get('categories');

            // TODO: Sincronizamos las categorías
            $product->categories()->sync($categories);

            //var_dump( $specifications[0] );
            // TODO: Creamos los ProductInfo
            for ( $i = 0; $i< sizeof($infos); $i++ )
            {
                //var_dump($infos[0]);
                // TODO: Esta inserción puede fallar por lo que podriamos un try catch
                ProductInfo::create([
                    'product_id' => $product->id,
                    'specification' => $infos[$i],
                    'content' => $specifications[$i]
                ]);
            }

            // TODO: Creamos las imágenes
            if ( $images )
            {
                $num = 0;
                foreach ( $images as $image )
                {
                    // TODO: Tratamiento de un archivo de forma tradicional
                    //var_dump($image->getClientOriginalExtension());
                    $path = public_path().'/images/category/';
                    $extension = $image->getClientOriginalExtension();
                    $filename = $alts[$num] . '.' . $extension;
                    $image->move($path, $filename);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                        'alt' => $alts[$num]
                    ]);
                    $num++;
                }
            }

            DB::commit();
        } catch ( \Throwable $e ) {
            DB::rollBack();
            return response()->json(['message' => $e], 422);
        }

        return response()->json(['message' => 'Producto guardado con éxito.'], 200);

    }

    public function edit( $id )
    {
        $product = Product::where('id', $id)->with(['shop', 'categories'])->first();
        $categories = Category::all();
        $shops = Shop::all();
        $cats = $product->categories->pluck('id')->toArray();
        //dd($cats);
        return view('product.edit', compact('shops', 'categories', 'product', 'cats'));
    }

    public function update(ProductUpdateRequest $request)
    {
        //
    }

    public function destroy(ProductDeleteRequest $request)
    {
        //
    }

    public function getInfo( $product_id )
    {
        $product = Product::find($product_id);
        $infos = $product->infos;

        return $infos;
    }

    public function getImages( $product_id )
    {
        $product = Product::find($product_id);
        $images = $product->images;

        return $images;
    }
}

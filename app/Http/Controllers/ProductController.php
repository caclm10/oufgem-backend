<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\Size;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at')->get();


        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::with('category')->get();
        return view('products.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];

        $product = new Product([
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => $input['description'],
            'price' =>  $input['price'] ?: 0,
            'discount' => $input['discount'] ?: 0,
            'type_id' => $input['type']
        ]);

        ModelHelper::save($product);

        flashCreated('Product');

        return to_route('products.edit', [$product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('sizes');
        $types = Type::with('category')->get();
        $sizes = Size::all();
        $availableSizes = $sizes->filter(fn ($size) => !$product->sizes->contains('size_id', $size->id));
        return view('products.edit', compact('product', 'types', 'sizes', 'availableSizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

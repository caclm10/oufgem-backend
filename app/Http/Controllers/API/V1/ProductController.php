<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $order = $request->input('order') ?: 'DESC';
        $limit = $request->input('limit');
        $imageLimit = $request->input('image_limit');

        $query = Product::query()
            ->with('images')
            ->orderBy('created_at', $order);

        if ($limit) $query->take((int) $limit);

        $products = $query->get();

        return response()->json([
            'products' => $products
        ]);
    }

    public function show(Request $request, Product $product)
    {
        $product->load('images');

        return response()->json(['product' => $product]);
    }
}

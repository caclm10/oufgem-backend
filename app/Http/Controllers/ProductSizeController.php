<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreProductSizeRequest;
use App\Http\Requests\UpdateProductSizeRequest;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public function store(StoreProductSizeRequest $request, Product $product)
    {
        $input = $request->validated();

        ModelHelper::saveRelation($product, 'sizes', new ProductSize([
            'size_id' => $input['size'],
            'stock' => $input['stock'] ?: 0
        ]));

        flashCreated('Product size');

        return to_route('products.edit', [$product]);
    }

    public function update(UpdateProductSizeRequest $request, Product $product, Size $size)
    {
        $input = $request->validated();

        $product
            ->sizes()
            ->where('size_id', $size->id)
            ->update([
                'stock' => $input["stock_{$size->id}"] ?: 0
            ]);

        flashUpdated('Product size');

        return to_route('products.edit', [$product]);
    }
}

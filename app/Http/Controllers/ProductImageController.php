<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ModelHelper;
use App\Helpers\RequestHelper;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function show(Request $request, ProductImage $productImage)
    {
        $template = $request->input('template');

        if ($template) {
            return [
                'template' => view('partials.products.image-list-item', compact('productImage'))->render()
            ];
        }

        return [
            'productImage' => $productImage
        ];
    }

    public function store(Request $request, Product $product)
    {
        if (!$product) return resourceNotFound('Product');

        $request->validate([
            'image' => [
                'required',
                'file',
                'image'
            ]
        ]);


        $imageURL = RequestHelper::saveImage();

        if ($imageURL) {
            $productImage = $product->images()->create(['url' => $imageURL]);

            return response()->json(status: 201, headers: [
                'Location' => route('products.images.show', [$productImage])
            ]);
        }

        return badRequest();
    }

    public function destroy(ProductImage $productImage)
    {
        if (!$productImage) return resourceNotFound('Product image');

        if ($productImage) {
            $imageURL = $productImage->url;
            ModelHelper::delete($productImage);
            FileHelper::deleteFromURL($imageURL);
        }

        return response()->json();
    }
}

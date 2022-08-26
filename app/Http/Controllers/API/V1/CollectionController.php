<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(Request $request, ?string $slug = null)
    {
        $collection = collect([]);
        if (!$slug) {
            $collection->put('products', Product::with('images')->orderBy('created_at', 'DESC')->get());
        } else {
            $collection = Category::where('slug', $slug)->first();

            if (!$collection) {
                $collection = Type::where('slug', $slug)->first();
            }

            if ($collection) {
                $collection->products = $collection->products()->with('images')->orderBy('created_at', 'DESC')->get();
            }
        }
        return ['collections' => $collection];
    }
}

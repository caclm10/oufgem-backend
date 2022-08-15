<?php

namespace App\Services;

use App\Helpers\ModelHelper;
use App\Models\Category;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public static function save(Category $category, $request)
    {
        DB::transaction(function () use ($category, $request) {
            ModelHelper::save($category);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('stores/images');

                if ($path) {
                    ModelHelper::saveRelation($category, 'image', new CategoryImage(['url' => asset($path)]));
                }
            }
        });
    }
}

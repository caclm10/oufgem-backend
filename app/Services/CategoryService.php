<?php

namespace App\Services;

use App\Helpers\FileHelper;
use App\Helpers\ModelHelper;
use App\Models\Category;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public static function save(Category $category, $request)
    {
        DB::transaction(function () use ($category, $request) {
            ModelHelper::save($category);

            $path = '';
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('storage/images');
            }

            ModelHelper::saveRelation($category, 'image', new CategoryImage(['url' => $path ? asset($path) : null]));
        });
    }

    public static function delete(Category $category)
    {
        if ($category) {
            $imageURL = $category->image->url;
            if (!$category->delete()) abort(500);

            FileHelper::deleteFromURL($imageURL);

            flashDeleted('Category');
            return to_route("categories.index");
        }

        return to_route("categories.edit", [$category]);
    }
}

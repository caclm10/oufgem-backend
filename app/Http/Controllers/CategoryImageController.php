<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ModelHelper;
use App\Helpers\RequestHelper;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryImageController extends Controller
{
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'image' => [
                'file',
                'image',
                'required'
            ]
        ]);

        if ($category) {
            $imageURL = RequestHelper::saveImage();

            if ($imageURL) {
                $categoryImage = $category->image;
                $urlBefore = $categoryImage->url;

                $categoryImage->url = $imageURL;
                ModelHelper::save($categoryImage);

                if ($urlBefore) FileHelper::deleteFromURL($urlBefore);

                return response()->json(['url' => $imageURL]);
            }
        }

        return response()->json(status: 422);
    }

    public function destroy(Category $category)
    {
        $status = 404;
        if (CategoryService::deleteImage($category)) $status = 200;

        return response()->json(status: $status);
    }
}

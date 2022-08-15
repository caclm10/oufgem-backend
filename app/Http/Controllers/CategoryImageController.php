<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ModelHelper;
use App\Helpers\RequestHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Category $category)
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
}

<?php

namespace App\Helpers;

class RequestHelper
{
    public static function saveImage()
    {
        $request = request();

        $image = $request->file('image');

        if ($request->hasFile('image') && $image->isValid()) {
            $path = $image->store('storage/images');

            if ($path) {
                $url = asset($path);
                return $url;
            } else abort(500);
        }


        return '';
    }
}

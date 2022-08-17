<?php

namespace App\Helpers;

class RequestHelper
{
    public static function saveImage(string $attribute = 'image')
    {
        $request = request();

        $image = $request->file($attribute);

        if ($request->hasFile($attribute) && $image->isValid()) {
            $path = $image->store('storage/images');

            if ($path) {
                $url = asset($path);
                return $url;
            } else abort(500);
        }


        return '';
    }
}

<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public static function deleteFromURL(string $url)
    {
        $file = null;

        if ($url) $file = str($url)->replace(config('app.url'), '');

        if ($file && !Storage::delete($file)) abort(500);
    }
}

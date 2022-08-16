<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('sizes.create');
    }

    public function store(StoreSizeRequest $request)
    {
        $input = $request->validated();

        $size = new Size($input);
        ModelHelper::Save($size);
        flashCreated('Size');
        return to_route('sizes.create');
    }

    public function edit(Size $size)
    {
        return view('sizes.edit', compact('size'));
    }

    public function update(UpdateSizeRequest $request, Size $size)
    {
        $input = $request->validated();

        $size->fill($input);
        ModelHelper::save($size);
        flashUpdated('Size');
        return to_route('sizes.edit', [$size]);
    }

    public function destroy(Size $size)
    {
        if ($size) {
            ModelHelper::delete($size);
            flashDeleted('Size');

            return to_route('sizes.index');
        }

        return to_route('sizes.edit', [$size]);
    }
}

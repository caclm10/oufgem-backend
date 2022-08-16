<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::with('category')->get();
        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('types.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];

        $type = new Type([
            'name' => $name,
            'slug' => str($name)->slug(),
            'category_id' => $input['category']
        ]);

        ModelHelper::save($type);

        flashCreated('Type');

        return to_route('types.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $categories = Category::all();

        return view('types.edit', compact('type', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTypeRequest  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $input = $request->validated();
        $name = $input['name'];
        $slug = str($name)->slug();

        if (ModelHelper::isAttributeTaken('types', 'slug', $slug, $type->id))
            return customValidate(['name' => 'The name has already been taken.']);

        $type->fill([
            'name' => $name,
            'slug' => $slug,
            'category_id' => $input['category']
        ]);

        ModelHelper::save($type);

        flashUpdated('Type');

        return to_route('types.edit', [$type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if ($type) {
            ModelHelper::delete($type);
            flashDeleted('Type');

            return to_route('types.index');
        }

        return to_route('types.edit', [$type]);
    }
}

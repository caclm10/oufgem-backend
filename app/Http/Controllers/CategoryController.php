<?php

namespace App\Http\Controllers;

use App\Helpers\ModelHelper;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all(['id', 'name']);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $input = $request->validated();
        $name = $input['name'];

        $category = new Category([
            'name' => $name,
            'slug' => str($name)->slug()
        ]);

        CategoryService::save($category, $request);

        flashCreated('Category');

        return to_route('categories.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $input = $request->validated();

        $name = $input['name'];
        $slug = str($name)->slug();

        if (ModelHelper::isAttributeTaken('categories', 'slug', $slug, $category->id))
            return customValidate(['name' => 'The name has already been taken']);

        $category->fill([
            'name' => $name,
            'slug' => $slug,
        ]);

        $categoryImage = $category->image;
        $categoryImage->home_position = $input['image_home_position'];

        DB::transaction(function () use ($categoryImage, $category) {
            ModelHelper::save($category);
            ModelHelper::save($categoryImage);
        });

        flashUpdated('Category');

        return to_route('categories.edit', [$category]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        return CategoryService::delete($category);
    }
}

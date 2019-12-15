<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $rules = [
        'name'      => 'required|max:255',
        'is_active' => 'boolean'
    ];

    //GET
    public function index()
    {
        return Category::where('is_active', true)->get();
    }

    //POST
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        return Category::create($request->all());
    }

    //GET
    public function show(Category $category) // Route Model Binding
    {
        return $category;
    }

    //PUT
    public function update(Request $request, Category $category)
    {
        $this->validate($request, $this->rules);
        $category->update($request->all());

        return $category;
    }

    //DELETE
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent(); // Status Code 204
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminator\Support\Facades\Validator;
use Illuminator\Validation\Rule;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    public function store(Category $category, Request $request) {
        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id]
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        $category = Category::create($attributes);

        session()->flash('success','Category Created Successfully');

        return redirect('/admin');
    }

    public function update(Category $category, Request $request) {

        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id]
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $category->update($attributes);

        session()->flash('success','Category Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(Category $category) {
        
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }

    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}

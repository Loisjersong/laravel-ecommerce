<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|string|max:255',
        ]);

        SubCategory::create([
            'category_id' => $request->input('category_id'),
            'subcategory_name' => $request->input('subcategory_name'),
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Sub Category created successfully.');
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategory.edit', compact('categories', 'subcategory'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_name' => 'required|string|max:255',
        ]);

        $subcategory->update([
            'category_id' => $request->input('category_id'),
            'subcategory_name' => $request->input('subcategory_name'),
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Sub Category updated successfully.');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('success', 'Sub Category deleted successfully.');
    }
}

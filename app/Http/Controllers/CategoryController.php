<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id = null)
    {
        if ($id) {
            $category = Category::findOrFail($id);
            return view('backend.category.index', compact('category'));
        } else {

            $categories = Category::all();
            return view('backend.category.index', compact('categories'));
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name'   => 'required|string|max:255',
            'category_status' => 'required|in:active,inactive',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryedit($id = null)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_name'   => 'required|string|max:255',
            'category_status' => 'required|in:active,inactive',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name'   => $request->category_name,
            'category_status' => $request->category_status,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoryDestroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}

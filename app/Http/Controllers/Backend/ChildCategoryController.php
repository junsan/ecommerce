<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childCategories = ChildCategory::all();
        return view('admin.child-category.index', compact('childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.child-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'name' => 'required|max:255|unique:child_categories,name',
            'status' => 'required'
        ]);

        $childCategory = new ChildCategory();
        $childCategory->category_id = $request->category;
        $childCategory->sub_category_id = $request->sub_category;
        $childCategory->name = $request->name;
        $childCategory->slug = Str::slug($request->name);
        $childCategory->status = $request->status;
        $childCategory->save();

        toastr('Child Category has been created');
        return redirect()->route('admin.child-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getSubCategories(Request $request) 
    {
        $subCategories = SubCategory::where('category_id', $request->id)->get();
        return response(['status' => 'success', 'data' => $subCategories]);
    }
}

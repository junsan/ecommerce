<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Traits\ImageUploadTrait;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|required',
            'name' => 'required|max:255',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $brand = new Brand();

        $imagePath = $this->imageUpload($request, 'logo', 'uploads');

        $brand->logo = $imagePath;
        $brand->name = $request->name;
        $brand->slug =  Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Banner has been created successfully.');
        return redirect()->route('admin.brand.index');
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
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'logo' => 'image',
            'name' => 'required|max:255',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $imagePath = $this->imageUpdate($request, 'logo', 'uploads', $brand);

        $brand->logo = $imagePath;
        $brand->name = $request->name;
        $brand->slug =  Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Banner has been updated successfully.');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        $this->imageDelete($brand->logo);
        return response(['status' => 'success', 'message' => 'Deleted Succcessfully!']);
    }

    public function changeStatus(Request $request) 
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();
        
        return response(['status' => 'success', 'message' => 'Status has been updated.']);
    }
}

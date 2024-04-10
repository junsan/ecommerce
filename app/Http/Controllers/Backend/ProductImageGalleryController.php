<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImageGallery;
use App\Models\Product;
use App\Traits\ImageUploadTrait;

class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::where('id', $request->product)->first();
        $images = ProductImageGallery::where('product_id', $request->product)->get();
        return view('admin.product.image_gallery.index', compact('images', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
           'images.*' => 'required|image' 
        ]);

        $imagePaths = $this->imageMultipleUpload($request, 'images', 'uploads');

        foreach($imagePaths as $path) {
            $product_gallery = new ProductImageGallery();
            $product_gallery->product_id = $request->product;
            $product_gallery->image = $path;
            $product_gallery->save();
        }

        toastr('Product image gallery has been created successfully.');
        return redirect()->back();
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
        $productImage = ProductImageGallery::findOrFail($id);
        $this->imageDelete($productImage->image);
        $productImage->delete();
        return response(['status' => 'success', 'message' => 'Deleted Succcessfully!']);
    }
}

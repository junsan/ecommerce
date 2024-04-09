<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'name' =>  'required|max:255',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'short_description' => 'required|max:600',
            'long_description' => 'required',
            'is_top' => 'required',
            'is_best' => 'required',
            'is_featured' => 'required',
            'is_new_arrival' => 'required',
            'seo_title' => 'required|max:255',
            'seo_description' => 'required|max:600',
            'status' => 'required'
        ]);

        $imagePath = $this->imageUpload($request, 'image', 'uploads');

        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->is_top = $request->is_top;
        $product->is_best = $request->is_best;
        $product->is_featured = $request->is_featured;
        $product->is_new_arrival = $request->is_new_arrival;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product has been created successfully.');
        return redirect()->route('admin.product.index');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $product->category_id)->get();
        $childCategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'subCategories', 'childCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'image' => 'image',
            'name' =>  'required|max:255',
            'category' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'short_description' => 'required|max:600',
            'long_description' => 'required',
            'is_top' => 'required',
            'is_best' => 'required',
            'is_featured' => 'required',
            'is_new_arrival' => 'required',
            'seo_title' => 'required|max:255',
            'seo_description' => 'required|max:600',
            'status' => 'required'
        ]);

        $imagePath = $this->imageUpdate($request, 'thumb_image', 'uploads', $product);

        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->is_top = $request->is_top;
        $product->is_best = $request->is_best;
        $product->is_featured = $request->is_featured;
        $product->is_new_arrival = $request->is_new_arrival;
        $product->status = $request->status;
        $product->is_approved = 1;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product has been updated successfully.');
        return redirect()->route('admin.product.index');
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

    public function getChildCategories(Request $request) 
    {
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return response(['status' => 'success', 'data' => $childCategories]);
    }    
}

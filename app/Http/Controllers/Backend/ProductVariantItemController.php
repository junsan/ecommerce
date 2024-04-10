<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

class ProductVariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productVariantItems = ProductVariantItem::where('product_variant_id', request()->variant)->get();
        $variant = ProductVariant::findOrFail(request()->variant);
        return view('admin.product.product-variant-item.index', compact('productVariantItems', 'variant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $variant = ProductVariant::findOrFail(request()->variant);
        return view('admin.product.product-variant-item.create', compact('variant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'variant' => 'required|integer',
            'name' => 'required|max:255',
            'price' => 'required',
            'is_default' => 'required',
            'status' => 'required'
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Product Variant Item has been created successfully.');
        return redirect()->route('admin.product-variant-item.index', ['variant' => $request->variant]);  
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
}

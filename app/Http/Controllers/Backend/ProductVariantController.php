<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $productVariants = ProductVariant::where('product_id', $request->product)->get();
        return view('admin.product.product-variant.index', compact('product', 'productVariants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Product::findOrFail($request->product);
        return view('admin.product.product-variant.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'product' => 'required|integer'
        ]);

        $productVariant = new ProductVariant();
        $productVariant->product_id = $request->product;
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Product Variant has been created successfully.');
        return redirect()->route('admin.product-variant.index', ['product' => $request->product]);
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
        $variant = ProductVariant::findOrFail($id);
        return view('admin.product.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $productVariant = ProductVariant::findOrFail($id);
        $productVariant->name = $request->name;
        $productVariant->status = $request->status;
        $productVariant->save();

        toastr('Product Variant has been updated successfully.');
        return redirect()->route('admin.product-variant.index', ['product' => $productVariant->product_id]);
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productVariant = ProductVariant::findOrFail($id);
        $variantItemCheck = ProductVariantItem::where('product_variant_id', $productVariant->id)->count();
        
        if ($variantItemCheck > 0) {
            return response(['status' => 'error', 'message' => 'Cannot delete. Delete first variant items.']);
        }

        $productVariant->delete();
        return response(['status' => 'success', 'message' => 'Deleted Succcessfully!']);
    }

    public function changeStatus(Request $request) 
    {
        $productVariant = ProductVariant::findOrFail($request->id);
        $productVariant->status = $request->status == 'true' ? 1 : 0;
        $productVariant->save();
        
        return response(['status' => 'success', 'message' => 'Status has been updated.']);
    }
}

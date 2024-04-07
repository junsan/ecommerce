<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploadTrait;

class AdminVendorProfileController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Vendor::where('user_id', Auth::user()->id)->first();
        return view('admin.vendor-profile.index', compact('profile'));
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
        $request->validate([
            'banner' => 'image',
            'phone' => 'required|max:255',
            'email' => 'required|max:255|email',
            'address' => 'required|max:255',
            'description' => 'required',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);

        $vendor = Vendor::where('user_id', Auth::user()->id)->first();

        $imagePath = $this->imageUpdate($request, 'banner', 'uploads', $vendor);

        $vendor->banner = $imagePath;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->description = $request->description;
        $vendor->facebook = $request->facebook;
        $vendor->twitter = $request->twitter;
        $vendor->instagram = $request->instagram;
        $vendor->save();

        toastr('Vendor Profile has been updated successfully.');
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
        //
    }
}

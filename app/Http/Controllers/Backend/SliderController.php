<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'image',
            'type' => 'required|max:255',
            'text' => 'required|max:255',
            'starting_price' => 'required|max:255',
            'button_url' => 'required|url',
            'serial' => 'required|integer',
            'status' => 'required'
        ]);

        $slider = new Slider();

        $imagePath = $this->imageUpload($request, 'banner', 'uploads');

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->text = $request->text;
        $slider->starting_price = $request->starting_price;
        $slider->button_url = $request->button_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider has been created successfully.');
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'banner' => 'image',
            'type' => 'required|max:255',
            'text' => 'required|max:255',
            'starting_price' => 'required|max:255',
            'button_url' => 'required|url',
            'serial' => 'required|integer',
            'status' => 'required'
        ]);

        $imagePath = $this->imageUpdate($request, 'banner', 'uploads', $slider);

        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->text = $request->text;
        $slider->starting_price = $request->starting_price;
        $slider->button_url = $request->button_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider has been updated successfully.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

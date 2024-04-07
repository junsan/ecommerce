<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait {
    
    public function imageUpload(Request $request, $imageName, $path) {

        if ($request->hasFile($imageName)) {

            $image = $request->{$imageName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqId().'.'.$ext;
            $image->move(public_path($path.'/'), $imageName);
            return $path.'/'.$imageName;
        }
    }

    public function imageUpdate(Request $request, $imageName, $path, $slider) {
        
        if ($request->hasFile($imageName)) {

            if (File::exists(public_path($slider->{$imageName}))) {
                File::delete(public_path($slider->{$imageName}));
            }

            $image = $request->{$imageName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqId().'.'.$ext;
            $image->move(public_path($path.'/'), $imageName);
            return $path.'/'.$imageName;
        }

        return $slider->{$imageName};
    }

    public function imageDelete($path) {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
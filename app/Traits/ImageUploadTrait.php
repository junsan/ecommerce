<?php

namespace App\Traits;
use Illuminate\Http\Request;

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

}
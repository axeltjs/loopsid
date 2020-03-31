<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

trait TraitUpload
{
    public function photoUploaded($request, $dir, $pastData = null, $newData = null)
    {
        $file_profile = $newData ?? $request->image;

        if (empty($file_profile)) {
            return null;
        }

        if (isset($pastData)) {
            $this->deletePhoto($dir, $pastData);
        }

        $profile = time().Str::slug($file_profile->getClientOriginalName(), '_').'.'.$file_profile->getClientOriginalExtension(); /* PART: generate file name */

        $this->SavePhoto($file_profile, public_path('storage/'.$dir.'/'), 1200); /* Save File Trough */

        return $profile;
    }

    public function SavePhoto($image, $path, $resize)
    {
        $file = $image;
        $photo = time().Str::slug($file->getClientOriginalName(), '_').'.'.$file->getClientOriginalExtension();
        $file->move($path, $photo);
        $img = Image::make($path.$photo);
        $img->resize($resize, $resize, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }

    public function deletePhoto($dir, $pastData)
    {
        return File::delete(public_path('storage/'.$dir.'/'.$pastData));
    }
}

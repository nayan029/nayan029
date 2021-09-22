<?php

namespace App\Http\Traits;

trait PdfUploadTraits
{
    public function uploadpdf($file)
    {
        $imageName = time() . '_' . rand(111, 999) . '.' . $file->getClientOriginalExtension();
        $path = 'user_uploads/';
        $file->move(public_path($path), $imageName);
        return $path . $imageName;
    }
}

<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            // Layas ra ten file goc
            $fileNameOrigin = $file->getClientOriginalName();
            // ten file name tren he thong
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }else{
            return null;
        }
      
    }
    public function storageTraitUploadMultiple($file, $foderName)
    {
            // Layas ra ten file goc
            $fileNameOrigin = $file->getClientOriginalName();
            // ten file name tren he thong
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
    }
}

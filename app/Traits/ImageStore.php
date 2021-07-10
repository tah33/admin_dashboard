<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageStore
{
    public function saveImage($name, $image, $path,$type, $width = null, $height = null)
    {
        if (!empty($image) && $image != 'null') {
            if ($type && $type != 'new')
            {
                $this->deleteImage($type);
            }
            $thumbName = $name;
            $thumb_resize = Image::make($image);
            if ($height && $width) {
                $thumb_resize->resize(88, 88);
            }
            $upload_path = $path;
            $thumb_resize->save($upload_path . $thumbName);
            return '/'.$upload_path . $thumbName;
        } else
            return $type;
    }

    public function deleteImage($old_image)
    {
        $image_path = substr($old_image, 1) ;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        return true;
    }
}

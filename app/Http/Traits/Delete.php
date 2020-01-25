<?php

namespace App\Http\Traits;

trait Delete
{

    public function deleteExistImage($content, $var)
    {
        $field = json_decode($content, true);
        if(!empty($field[$var]) && file_exists(public_path() . $field[$var])) {
            unlink(public_path() . $field[$var]);
        }
    }

    /**
     * Delete File Physicaly From Disk.
     *
     * @param string $file
     * @return boolean
     */
    public function deleteFile($file)
    {
        if(!is_null($file) && $file !== ""){
            $filePath = public_path($file);
            if (file_exists($filePath)) {
                if(unlink($filePath)) { return true;} else { return false;}
            }
            return true;
        }
        return true;
    }

    /**
     * Delete File Physicaly From Disk.
     *
     * @param string $file
     * @return boolean
     */
    public function deleteFiles($files)
    {
        if(!is_null($files) && $files !== '""'){

            foreach(json_decode($files) as $file){
                $filePath = public_path($file);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            return true;
        }

        return true;
    }

    /**
     * Delete images of object
     *
     * @param array $images
     * @param Object $classImg
     * @return bool
     */
    public function deleteImagesObj($images, $classImg)
    {
        foreach ($images as $img) {
            $imagePath = public_path($img->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $currentImg = $classImg::find($img->id);
            $currentImg->delete();
            return true;
        }
    	return false;
    }
}

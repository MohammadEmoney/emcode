<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;
use Zip;
use File;
use Image;
use ZipArchive;

trait Uploads {

    /**
     * Create path for saving files.
     *
     * @param string $folder
     * @param string $type
     *
     * @return string
     */
    public function createPath($folder, $type)
    {
        $folder = explode("\\", $folder);
        $date = date('Ymdhms');
        return  "/uploads/$type/" . end($folder) . "/$date/";
    }


    /**
     * Upload image for any kind of object.
     *
     * @param File $file
     * @param string $folder
     * @return string path of image
     */
    public function uploadImage($file, $folder, $crop = "")
    {
        $uploadPath = $this->createPath($folder, "image");
        $fileName = Str::random(30) . "." . $file->getClientOriginalExtension();
        $path = public_path(ltrim($uploadPath , '/' ));
        if(!is_null($crop) && $crop !== ""){
            $crop = explode("," , $crop);
            $img = Image::make($file);
            $img->crop((int)$crop[2], (int)$crop[3], (int)$crop[0], (int)$crop[1]);
            // dd($img);
            if (!file_exists($path)) {
                mkdir($path, 666, true);
            }
            $img->save($path . $fileName);
        }else{
            $file->move($path , $fileName);
        }

        return $uploadPath . $fileName;
    }

    /**
     * Upload image for any kind of object.
     *
     * @param File $file
     * @param string $folder
     * @return array path of image
     */
    public function uploadGallery($file, $folder)
    {
        $output = [];
        $uploadPath = $this->createPath($folder, "gallery");

        foreach($file as $img){
            $fileName = Str::random(30) . "." . $img->getClientOriginalExtension();
            $path = public_path($uploadPath);
            $img->move($path, $fileName);
            $output[] = $uploadPath . $fileName;
        }

        return $output;
    }

    /**
     * Upload file.
     *
     * @param Array $files
     * @param Collection $folder
     *
     * @return bool|string
     */
    public function uploadeFilesAndZip($files, $folder)
    {
        $password = request()->getHost();
        $uploadPath = $this->createPath($folder, "file");
        $zipName = Str::random(10). "." . "zip";
        $savedFiles = [];
        // dd($files);
        foreach($files as $file){
            $fileName = Str::random(10).  "." . $file->getClientOriginalExtension();
            $path = public_path($uploadPath);
            $file->move($path, $fileName);
            $savedFiles[]  = $uploadPath . $fileName;
        }

        $zip = new ZipArchive();

        if ($zip->open(public_path($uploadPath . $zipName), ZipArchive::CREATE) === TRUE)
        {
            $zip->setPassword($password);
            $files = File::files($path);

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
                $zip->setEncryptionName($relativeNameInZipFile, ZipArchive::EM_AES_256);
            }

            $zip->close();

            foreach($savedFiles as $savedFile){
                unlink(public_path(ltrim($savedFile, "/")));
            }
            return $uploadPath . $zipName;
        }
        return false;

    }


}



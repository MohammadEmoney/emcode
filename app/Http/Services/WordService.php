<?php

namespace App\Http\Services;

class WordService
{
    public function __construct()
    {

    }

    public function grab_json_definition($word, $ref, $key)
    {
        $uri = "https://dictionaryapi.com/api/v3/references/" . urlencode($ref) . "/json/" . urlencode($word) . "?key=" . urlencode($key);

        return file_get_contents($uri);
    }
}

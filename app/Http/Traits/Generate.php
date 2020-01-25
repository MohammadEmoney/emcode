<?php

namespace App\Http\Traits;

trait Generate
{
    /**
     * Generate Reference ID for User
     *
     * @param int $userId
     * @return string
     */
    public function referenceId($userId)
    {
        $id = "REF-" . $userId .uniqid();
        return $id;
    }
}

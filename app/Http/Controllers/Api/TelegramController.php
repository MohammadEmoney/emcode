<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    protected $token;

    public function __construct()
    {
        $this->token = env('TELEGRAM_TOKEN');

        //$result =
    }
}

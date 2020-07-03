<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'user_id', 'day', 'learnt', 'word', 'word_id', 'uuid', 'stems', 'app_shortdef', 'offensive', 'ipa', 'sound', 'fl', 'ins', 'def', 'shortdef', 'extra'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

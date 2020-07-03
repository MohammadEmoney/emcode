<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name' , 'email', 'subject', 'body', 'user_id'
    ];

    /**
     * Contact Message belongs to User
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

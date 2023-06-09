<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greeting extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'sender_name',
        'recipient_name',
        'message',
        'photo_url',
        'created_time'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

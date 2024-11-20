<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'text',
        'is_offensive',
        'name'
    ];
}

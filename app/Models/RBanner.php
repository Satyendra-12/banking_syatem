<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RBanner extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
       'status',
    ];
}

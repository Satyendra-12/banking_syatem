<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class management extends Model
{
    use HasFactory;
    // In your Management model
protected $fillable = ['user_id', 'name', 'role', 'number', 'email', 'status'];

}

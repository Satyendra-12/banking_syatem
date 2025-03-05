<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;
    
    public function scopeActive($query)
    {
        $query->where('status', '1');
    }

    public function sub_categories()
    {
        return $this->hasMany(Subcategory::class,'category_id','id');
    }
}

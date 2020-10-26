<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_title', 'product_slug', 'product_image'];
    
    public function descriptionProduct()
    {
        return $this->hasOne(descriptionProduct::class);
    }

    public function category()
    {
        return $this->belongTo(Category::class);
    }
}

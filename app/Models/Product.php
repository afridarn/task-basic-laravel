<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price', 'description', 'stock', 'photo'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function productReview()
    {
        return $this->hasMany(ProductReview::class);
    }
}

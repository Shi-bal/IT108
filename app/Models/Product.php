<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_title', 'description', 'price', 'quantity', 'image1', 'image2', 'image3'
    ];
}

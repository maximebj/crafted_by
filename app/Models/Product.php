<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name', 
        'price', 
        'quantity', 
        'description'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}

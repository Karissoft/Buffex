<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'images',
        'in_stock',
        'category_id',
        'price',
        'status',
        'sizes',
        'colors'

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'images' => 'array',
        'colors' => 'array',
        'sizes' => 'array'

    ];
}

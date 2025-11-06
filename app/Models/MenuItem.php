<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'ingredients',
        'preparation_time',
        'is_available',
        'is_featured'
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2'
    ];

    // العلاقة مع الفئة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
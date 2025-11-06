<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'bio',
        'specialty',
        'experience_years',
        'image',
        'is_active',
        'order',
        'social_links',
        'email',
        'phone'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'social_links' => 'array'
    ];
}
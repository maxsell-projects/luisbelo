<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'title',
        'slug',
        'description',
        'price',
        'type',
        'bedrooms',
        'bathrooms',
        'garage',
        'area',
        'address',
        'features',
        'active'
    ];

    protected $casts = [
        'features' => 'array',
        'price' => 'decimal:2',
        'active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title) . '-' . Str::random(4);
            }
        });
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function cover()
    {
        return $this->hasOne(PropertyImage::class)->where('is_cover', true)->latest();
    }
}
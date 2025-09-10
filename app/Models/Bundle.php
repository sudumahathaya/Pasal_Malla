<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_sinhala',
        'slug',
        'description',
        'description_sinhala',
        'price',
        'original_price',
        'image',
        'grade_level',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2'
    ];

    public function bundleProducts()
    {
        return $this->hasMany(BundleProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_products')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSavingsAmount()
    {
        return $this->original_price - $this->price;
    }

    public function getSavingsPercentage()
    {
        if ($this->original_price <= 0) {
            return 0;
        }

        return round((($this->original_price - $this->price) / $this->original_price) * 100);
    }
}

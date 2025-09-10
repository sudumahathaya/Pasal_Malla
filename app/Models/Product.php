<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_sinhala',
        'slug',
        'description',
        'description_sinhala',
        'price',
        'sale_price',
        'sku',
        'stock_quantity',
        'images',
        'category_id',
        'grades',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'images' => 'array',
        'grades' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bundleProducts()
    {
        return $this->hasMany(BundleProduct::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCurrentPrice()
    {
        return $this->sale_price ?? $this->price;
    }

    public function hasDiscount()
    {
        return $this->sale_price && $this->sale_price < $this->price;
    }

    public function getDiscountPercentage()
    {
        if (!$this->hasDiscount()) {
            return 0;
        }

        return round((($this->price - $this->sale_price) / $this->price) * 100);
    }
}

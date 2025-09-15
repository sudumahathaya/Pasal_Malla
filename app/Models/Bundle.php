<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
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

    public function getImageUrl()
    {
        if ($this->image) {
            if (preg_match('/^(?:https?:)?\/\//i', $this->image) || str_starts_with($this->image, 'data:')) {
                return $this->image;
            }

            if (Storage::disk('public')->exists($this->image)) {
                return Storage::url($this->image);
            }

            $publicRelativePath = ltrim($this->image, '/');
            if (file_exists(public_path($publicRelativePath))) {
                return asset($publicRelativePath);
            }
        }

        return 'https://images.pexels.com/photos/207662/pexels-photo-207662.jpeg?auto=compress&cs=tinysrgb&w=400';
    }
}

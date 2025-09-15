<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'product_id',
        'stock_quantity',
        'image',
        'category_id',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
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

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
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

    public function getImageUrl()
    {
        if ($this->image) {
            // If already an absolute URL or data URI, return as-is
            if (preg_match('/^(?:https?:)?\/\//i', $this->image) || str_starts_with($this->image, 'data:')) {
                return $this->image;
            }

            // Prefer Storage URL when file exists on public disk
            if (Storage::disk('public')->exists($this->image)) {
                return Storage::url($this->image);
            }

            // If file exists under public/ return asset path
            $publicRelativePath = ltrim($this->image, '/');
            if (file_exists(public_path($publicRelativePath))) {
                return asset($publicRelativePath);
            }
        }

        // Return default image based on category
        if ($this->category) {
            return match ($this->category->slug) {
                'books-notebooks' => 'https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400',
                'stationery' => 'https://images.pexels.com/photos/207662/pexels-photo-207662.jpeg?auto=compress&cs=tinysrgb&w=400',
                'school-bags' => 'https://images.pexels.com/photos/2905238/pexels-photo-2905238.jpeg?auto=compress&cs=tinysrgb&w=400',
                'lunch-water-bottles' => 'https://images.pexels.com/photos/6195129/pexels-photo-6195129.jpeg?auto=compress&cs=tinysrgb&w=400',
                'art-craft' => 'https://images.pexels.com/photos/1148998/pexels-photo-1148998.jpeg?auto=compress&cs=tinysrgb&w=400',
                default => 'https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400'
            };
        }

        return 'https://images.pexels.com/photos/159751/book-address-book-learning-learn-159751.jpeg?auto=compress&cs=tinysrgb&w=400';
    }
}

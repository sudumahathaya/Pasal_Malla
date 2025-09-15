<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_sinhala',
        'slug',
        'description',
        'icon',
        'image',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
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

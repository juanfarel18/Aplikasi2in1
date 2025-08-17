<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarwashSlider extends Model
{
    protected $fillable = ['title', 'image_path', 'link', 'order', 'status'];

    public function getImageUrlAttribute()
    {
        if (!$this->image_path) {
            return asset('images/no-image.png');
        }
        if (filter_var($this->image_path, FILTER_VALIDATE_URL)) {
            return $this->image_path;
        }
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}

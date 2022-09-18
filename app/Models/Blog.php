<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'details',
        'image',
    ];

    public function categoryName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->select(['id', 'cat_name'])->withDefault();
    }

    public function userName()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id', 'name'])->withDefault();
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('M d, Y', strtotime($value))
        );
    }
}

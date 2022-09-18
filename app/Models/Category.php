<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cat_name',
    ];

        public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('M d, Y', strtotime($value))
        );
    }
}

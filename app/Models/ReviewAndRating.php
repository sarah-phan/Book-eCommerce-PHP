<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewAndRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_id',
        'user_id',
        'book_id',
        'content',
        'rating',
    ];
}

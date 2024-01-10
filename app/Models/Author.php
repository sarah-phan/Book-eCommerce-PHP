<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'author_name',
    ];

    protected $table = 'author';

    public function book(){
        return $this->belongsToMany(Book::class, 'author_book', 'author_id', 'book_id');
    }

    protected $primaryKey = 'author_id';

    public $incrementing = false;

    public $timestamps = false;
}

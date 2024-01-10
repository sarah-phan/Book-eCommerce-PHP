<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'subcategory_name',
        'category_id'
    ];

    protected $table = 'subcategory_table';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function book(){
        return $this->belongsToMany(Book::class, 'subcategory_book', 'subcategory_id', 'book_id');
    }

    protected $primaryKey = 'subcategory_id';

    public $incrementing = false;

    public $timestamps = false;
}

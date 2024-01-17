<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'company_id',
        'title',
        'ISBN',
        'page_number',
        'cover_type',
        'inventory_quantity',
        'price',
        'description',
        'book_image_path'
    ];

    protected $table = 'book';

    public function category()
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }

    public function subcategory_table()
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_book', 'book_id', 'subcategory_id');
    }

    public function author()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    public function publishing_company()
    {
        return $this->belongsTo(PublishingCompany::class, 'company_id');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_item', 'book_id', 'order_id');
    }

    public function cart()
    {
        return $this
            ->belongsToMany(Cart::class, 'cart_item', 'book_id', 'cart_id')
            ->withPivot('quantity');
    }

    protected $primaryKey = 'book_id';

    public $incrementing = false;

    public $timestamps = false;
}

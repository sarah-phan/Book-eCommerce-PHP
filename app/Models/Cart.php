<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function book(){
        return $this->belongsToMany(Book::class, 'cart_id', 'book_id');
    }
    protected $primaryKey = 'cart_id';
    public $incrementing = false;
    public $timestamps = false;
}

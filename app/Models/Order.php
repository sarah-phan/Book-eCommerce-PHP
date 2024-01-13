<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'shipping_information_id',
        'order_status',
        'total_price'
    ];

    protected $table = 'order';

    public function shipping_information()
    {
        return $this->belongsTo(ShippingInformation::class, 'shipping_information_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book()
    {
        return $this->belongsToMany(Book::class, 'order_item', 'order_id', 'book_id');
    }

    protected $primaryKey = 'order_id';

    public $incrementing = false;

    public $timestamps = true;
}

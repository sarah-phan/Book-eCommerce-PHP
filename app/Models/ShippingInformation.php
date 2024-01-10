<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_information_id',
        'user_id',
        'receiver_name',
        'receiever_phone',
        'address'
    ];

    protected $table = 'shipping_information';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $primaryKey = 'shipping_information_id';

    public $incrementing = false;

    public $timestamps = false;
}

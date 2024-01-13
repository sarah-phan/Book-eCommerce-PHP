<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    protected $primaryKey = 'transaction_id';

    public $incrementing = false;

    public $timestamps = true;
}

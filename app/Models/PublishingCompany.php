<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublishingCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_name',
        'company_address',
        'company_phone',
    ];

    protected $table = 'publishing_company';

    protected $primaryKey = 'company_id';

    public $incrementing = false;

    public $timestamps = false;
}

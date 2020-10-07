<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'base_currency',
        'converted_currency',
        'base_rate',
        'converted_rate',
        'base_date',
        'rate_date',
    ];
}

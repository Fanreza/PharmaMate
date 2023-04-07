<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'brand',
        'type',
        'unit',
        'group',
        'packaging',
        'price',
        'quantity',
    ];
}

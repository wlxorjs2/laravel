<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jangbu extends Model
{
    use HasFactory;

    protected $fillable = [
        'io32',
        'writeday32',
        'products_id32',
        'price32',
        'numi32',
        'numo32',
        'prices32',
        'bigo32'
    ];
}

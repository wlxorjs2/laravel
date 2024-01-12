<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'gubuns_id32',
        'name32',
        'price32',
        'jaego',
        'pic32'
    ];
}

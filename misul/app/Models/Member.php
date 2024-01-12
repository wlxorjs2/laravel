<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservation;

class Member extends Model
{
    use HasFactory;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }


    protected $fillable = [
        'uid',
        'pwd',
        'name',
        'email',
        'tel',
        'rank'
    ];
}

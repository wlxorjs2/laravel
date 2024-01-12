<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

protected $fillable = ['member_id', 'date'];
protected $dates = ['date'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

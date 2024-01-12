<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
	
	protected $fillable = [
	
		'uid32',
		'pwd32',
		'name32',
		'tel32',
		'rank32'
		
	];

}

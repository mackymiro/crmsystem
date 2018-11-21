<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewed extends Model
{
    //
	protected $fillable = [
		'flag_id',
		'status',
		'first_name',
		'last_name',
	];
	
}

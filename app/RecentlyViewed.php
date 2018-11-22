<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewed extends Model
{
    //
	protected $fillable = [
		'lead_id',
		'client_id',
		'status',
		'first_name',
		'last_name',
		'date',
	];
	
}

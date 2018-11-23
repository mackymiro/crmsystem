<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentlyViewed extends Model
{
	
	protected $primaryKey = "lead_id";
	
    //
	protected $fillable = [
		'lead_id',
		'client_id',
		'status',
		'first_name',
		'last_name',
		'date',
		'flag_status',
	];
	
}

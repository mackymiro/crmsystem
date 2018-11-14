<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opp extends Model
{
    //
	protected $fillable = [
		'client_id',
		'code',
		'contacts',
		'case_name',
		'case_stage',
		'description',
		'estimated_amount',
		'actual_amount',
		'owner',
	];
}

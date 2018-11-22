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
		'tax_year',
		'owner',
	];
}

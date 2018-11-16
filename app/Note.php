<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
	protected $fillable = [
		'client_id',
		'lead_id',
		'case_id',
		'notes_date_time',
		'notes',
		'posted_by',
		'filename',
	
	];
}

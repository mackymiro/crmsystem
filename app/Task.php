<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
	protected $fillable = [
		'status',
		'assigned_to',
		'name',
		'subject',
		'due_date',
		'priority',
		'type',
		'created_by',
	];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
	protected $fillable = [
		'title',
		'first_name',
		'middle_name',
		'last_name',
		'company',
		'dob',
		'phone_number',
		'email',
		'mobile_number',
		'lead_source',
		'referral',
		'lead_status',
		'employment_type',
		'national_insurance',
		'utr',
		'registered',
		'authority_letter',
		'bank_authority',
		'streets',
		'city',
		'province',
		'zip',
		'country',
		'lead_assignment',
		'description',
		'owner',
	];
}

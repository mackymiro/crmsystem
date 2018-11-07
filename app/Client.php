<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
	protected $fillable = [
		'title',
		'first_name',
		'middle_name',
		'last_name',
		'company',
		'dob',
		'profession',
		'phone_number',
		'email',
		'mobile_number',
		'referral',
		'commission',
		'employment_type',
		'national_insurance',
		'utr',
		'registered',
		'authority_letter',
		'bank_authority',
		'street',
		'city',
		'province',
		'zip',
		'country',
		'description',
		'owner',
	];
}

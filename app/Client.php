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
		'contact_status',
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
		'monthly_percentage',
		'pay_day',
		'bank_authority',
		'bank_name',
		'bank_acct_number',
		'bank_shortcode',
		'change_frequency',
		'payment_frequency',
		'street',
		'city',
		'province',
		'zip',
		'country',
		'description',
		'owner',
	];
}

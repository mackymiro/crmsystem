<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
	protected $fillable = [
		'client_id',
		'case_id',
		'contact_name',
		'case_name',
		'invoice_number',
		'item_code',
		'reference',
		'amount',
		'vat_amount',
		'total_amount',
		'amount_due',
		'status',
		'created_by',
	];
}

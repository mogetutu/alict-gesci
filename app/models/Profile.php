<?php

class Profile extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'firstname'   => 'required',
		'lastname'    => 'required',
		'country'     => 'required',
		'gender'      => 'required',
		'dob'         => 'required|date|date_format:Y-m-d',
		'nationality' => 'required',
		'workaddress' => 'required',
		'email'       => 'required',
		'mobile'      => 'required|min:10|regex:/^\+/'
	);

	public function user()
	{
		return $this->belongsTo('user');
	}
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';

	protected $guarded = [];

	public static function allowRegistrations($value)
	{
		$site = Site::first();
		$site->update(['allow_registrations' => $value]);

		return $site;
	}
}

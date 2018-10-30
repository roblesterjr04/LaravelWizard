<?php

namespace Lester\LaravelWizard\Facades;

use Illuminate\Support\Facades\Facade;

class Wizard extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'wizard';
	}
}

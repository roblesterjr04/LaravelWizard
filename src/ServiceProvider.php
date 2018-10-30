<?php

namespace Lester\LaravelWizard;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function boot()
	{
		
	}
	
	public function register()
	{
		
		$this->app->bind('wizard', function() {
			return new Wizard();
		});
		
	}
	
}
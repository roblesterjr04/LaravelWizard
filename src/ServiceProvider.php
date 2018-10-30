<?php

namespace Lester\LaravelWizard;

use Lester\LaravelWizard\Console\StepMakeCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	const CONFIG_PATH = __DIR__ . '/../config/config.php';
	
	public function boot()
	{
		if ($this->app->runningInConsole()) {
	        $this->commands([
	            StepMakeCommand::class,
	        ]);
	    }
    
		$this->publishes([
			self::CONFIG_PATH => config_path('wizard.php'),
		], 'config');
	}
	
	public function register()
	{
		
		$this->mergeConfigFrom(
			self::CONFIG_PATH,
			'wizard'
		);
		
		$this->app->bind('wizard', function() {
			return new Wizard();
		});
		
	}
	
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
	/**
	* Register any application services.
	*/
	public function register(): void
	{
		$this->app['request']->server->set('HTTPS', true);
	}
	/**
	* Bootstrap any application services.
	*/
	public function boot(): void
	{
		// As these are concerned with application correctness,
		// leave them enabled all the time.
		Model::preventAccessingMissingAttributes();
		Model::preventSilentlyDiscardingAttributes();
		
		// Since this is a performance concern only, don’t halt
		// production for violations.
		Model::preventLazyLoading(!$this->app->isProduction());
		
		URL::forceScheme('https');
		
		Schema::defaultStringLength(125);
		
		Sanctum::ignoreMigrations();
	}
}

<?php

namespace App\Providers;

use App\Model\Company;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('companies', function ($app) {
            return new Company();
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('Company', Company::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // check if app is running in console
        // and the company table is available in the db

        if (!App::runningInConsole() && count(Schema::getColumnListing('companies'))) {
            $companies = Company::all();
            foreach ($companies as $key => $company) {
                Config::set('company.'. $company->key, $company->value);
            }
        }
    }
}

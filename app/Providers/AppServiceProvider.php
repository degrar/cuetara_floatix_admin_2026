<?php

namespace App\Providers;

use App\Transports\MandrillTransport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use MailchimpTransactional\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Mail::extend('mandrill', function (array $config = []) {
            $apiClient = new ApiClient();
            $apiClient->setApiKey(config('services.mandrill.key'));
            return new MandrillTransport($apiClient);
	    });

        if (config('app.env') === 'production') {
            \URL::forceRootUrl(str_replace(config('duplex.promo.url_project_name'), '', config('app.url')));
        }
    }
}

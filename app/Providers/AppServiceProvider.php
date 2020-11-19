<?php

namespace App\Providers;

use App\Events\UploadCsv;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::failing(function (JobFailed $event) {
             $data = [
            "msg" => 'Failed'
        ];
            event(new UploadCsv($data));
            // $event->connectionName
            // $event->job
            // $event->exception
        });
    }
}

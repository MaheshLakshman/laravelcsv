<?php

namespace App\Listeners;

use App\Mail\CsvMail;
use App\Events\UploadCsv;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCsvUpload
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UploadCsv $event)
    {
        //$info['name'] = $event->data;
        Mail::to('charush@accubits.com')->send(new CsvMail($event->data));
    }
}

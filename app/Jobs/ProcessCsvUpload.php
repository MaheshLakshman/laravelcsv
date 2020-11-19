<?php

namespace App\Jobs;

use App\Http\Responses\ErrorResponse;
use App\Models\Module;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Throwable;

class ProcessCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $file;
    
    protected Module $module;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Module $module, $file)
    {
        $this->module = $module;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = array_map('str_getcsv', file($this->file));
        foreach($data as $row)
        {
            $this->module->updateOrCreate([
                'module_code' => $row[0]
            ],
              [
                  'module_name' => $row[1],
                  'module_term' => $row[2]
            ]);
        }
       
       unlink($this->file);
    }
}

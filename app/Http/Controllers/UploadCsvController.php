<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Events\UploadCsv;
use App\Jobs\ValidateQueue;
use App\Jobs\JobSuccessMail;
use Illuminate\Http\Request;
use App\Jobs\ProcessCsvUpload;
use App\Http\Responses\SuccessResponse;
use App\Http\Requests\FileUploadRequest;
use Illuminate\Support\Facades\Validator;

class UploadCsvController extends Controller
{
    public Module $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }
    public function store(FileUploadRequest $request)
    {   
        $file = file($request->file('csv_file')->getRealPath());
        $datas = array_slice($file, 1);

        $parts = array_chunk($datas, 250);
        foreach($parts as $key => $part)
        {
            $fileName = resource_path('job-file/'.date('y-m-d-H-i-s').$key.'.csv');
            file_put_contents($fileName, $part);
        }
        $this->save();
       
        return new SuccessResponse("Success");
    }

    public function save() : void
    {
        $files = resource_path('job-file/*.csv');
        $paths = glob($files);
        foreach($paths as $file)
        {
            ProcessCsvUpload::dispatch($this->module, $file);
        }
    }

    public function emailTest()
    {
        // $data = [
        //     "msg" => 'test'
        // ];
        // event(new UploadCsv($data));
        //JobSuccessMail::dispatch('Success');
    }
}

<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class ErrorResponse implements Responsable
{
    public int $status;

    public $msg;

    public function __construct($msg, $status = 400)
    {
        $this->msg = $msg;
        $this->status = $status;
    }
    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return response()->json([
            'success' => false,
            'msg' => $this->msg,
        ], $this->status);
    }
}
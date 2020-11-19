<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class SuccessResponse implements Responsable
{
    private int $status;

    private string $msg;

    public function __construct($msg, $status = 200)
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
            'success' => true,
            'msg' => $this->msg,
        ], $this->status);
    }
}
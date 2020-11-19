<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class SuccessWithData implements Responsable
{
    private int $status;

    private $data;

    public function __construct($data, $status = 200)
    {
        $this->data = $data;
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
            'data' => $this->data,
        ], $this->status);
    }
}
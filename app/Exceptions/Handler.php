<?php

namespace App\Exceptions;

use Throwable;
use App\Http\Responses\ErrorResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $exception, $request) {
            $msg = $exception->getMessage();
            $statusCode = 400;
            switch (true) {
                case $exception instanceof ModelNotFoundException:
                    $msg = 'No results found';
                    break;
                case $exception instanceof ValidationException:
                    $msg = $exception->validator->errors();
                    break;
                case $exception instanceof NotFoundHttpException:
                    $msg = 'Invalid url';
                    $statusCode = 404;
                    break;
            }
            return new ErrorResponse($msg, $statusCode);
        });
    }
}

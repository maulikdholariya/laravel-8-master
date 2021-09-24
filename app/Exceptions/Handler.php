<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Auth\Access\AuthorizationException;
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
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {

            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Record not found.'
                ], 404);
            }
            // if ($request->expectsJson() && $e instanceof ModelNotFoundException) {
            //         return response()->json(['message' => $e->getMessage()],404);
            // }

            // if ($request->expectsJson() && $e instanceof AuthorizationException) {
            //     return response()->json(['message' => $e->getMessage()], 403);
            // }

        });
    }
    // custom added


    // public function render($request, Throwable $exception)
    // {
    //     if ($request->expectsJson() && $exception instanceof ModelNotFoundException) {
    //         return response()->json(['message' => $exception->getMessage()],404);
    //     }

    //     if ($request->expectsJson() && $exception instanceof AuthorizationException) {
    //         return response()->json(['message' => $exception->getMessage()], 403);
    //     }

    //     return parent::render($request, $exception);
    // }
}

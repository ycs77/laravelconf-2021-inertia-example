<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

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
        'current_password',
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
        $this->reportable(function (Throwable $exception) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $response = parent::render($request, $exception);
        $code = $response->getStatusCode();
        $errorMessages = [
            401 => 'Unauthorized',
            403 => $exception->getMessage() ?: 'Forbidden',
            404 => 'Not Found',
            419 => 'The page expired, please try again.',
            429 => $exception->getMessage() ?: 'Too Many Requests',
            500 => 'Server Error',
            503 => $exception->getMessage() ?: 'Service Unavailable',
        ];

        if (in_array($code, array_keys($errorMessages))) {
            $message = __($errorMessages[$code]);
            if (in_array($code, [419, 429])) {
                return back()->with(['error_message' => $message]);
            } elseif (! config('app.debug')) {
                return Inertia::render('Error')
                    ->with('code', $code)
                    ->with('message', $message)
                    ->toResponse($request)
                    ->setStatusCode($code);
            }
        }

        return $response;
    }
}

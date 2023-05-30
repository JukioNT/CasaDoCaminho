<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception){
        $guard = $exception->guards();
        switch($guard[0]){
            case 'admin':
                $redirect = 'login-admin';
                break;
            case 'web':
                $redirect = 'login';
                break;
            default:
                $redirect = 'login';
                break;
        }
        return redirect()->guest(route($redirect));
    }
}

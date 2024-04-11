<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // 400
        $exceptions->render(function (Exception\BadRequestHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_BAD_REQUEST',
                    'message' => $e->getMessage(),
                ]);
            }
        });

        // 401
        $exceptions->render(function (Exception\UnauthorizedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_INVALID_REFRESH_TOKEN',
                    'message' => $e->getMessage(),
                ]);
            }
        });

        // 403
        $exceptions->render(function (Exception\AccessDeniedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_FORBIDDEN_ACCESS',
                    'message' => $e->getMessage(),
                ]);
            }
        });

        // 404
        $exceptions->render(function (Exception\NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_NOT_FOUND',
                    'message' => $e->getMessage(),
                ]);
            }
        });

        $exceptions->render(function (Exception\MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_METHOD_NOT_ALLOWED',
                    'message' => $e->getMessage(),
                ]);
            }
        });

        // 500
        $exceptions->render(function (Exception\ServiceUnavailableHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'status' => false,
                    'error' => 'ERR_INTERNAL_ERROR',
                    'message' => $e->getMessage(),
                ]);
            }
        });
    })->create();

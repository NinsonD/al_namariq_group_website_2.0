<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only check when app mode = demo
        if (strtolower(config('app.app_mode')) === 'demo') {

            // ✅ Allowed routes by name
            $allowedRoutes = [
                'user.login',
                'user.login.post',
                'user.logout',
                'login',
                'login.store',
                'logout',
                'set-home',
                'set.language',
                'set.currency',
                'admin.login',
                'admin.password.request',
                'admin.password.email',
                'admin.password.reset',
                'admin.password.store',
                'user.password.request',
                'user.password.email',
                'user.register',
                'user.register.post',
            ];

            $allowedUris = [
                'admin/login',
            ];

            if (in_array($request->path(), $allowedUris)) {
                return $next($request);
            }

            // ✅ If request is GET or route name is allowed → pass
            if ($request->isMethod('GET') || $request->routeIs(...$allowedRoutes)) {
                return $next($request);
            }

            // check if request is ajax with post,put,delete,patch method then return back with error
            if ($request->ajax() && in_array($request->method(), ['POST', 'PUT', 'DELETE', 'PATCH'])) {
                return response()->json([
                    'status' => false,
                    'message' => __('notification.demo_middleware_msg')
                ], 403);
            }

            // ✅ Otherwise block with message
            return redirect()->back()->with('error', __('notification.demo_middleware_msg'));
        }

        // Not demo mode → normal flow
        return $next($request);
    }
}

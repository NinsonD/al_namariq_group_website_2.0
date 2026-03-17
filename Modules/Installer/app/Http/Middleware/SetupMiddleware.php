<?php

namespace Modules\Installer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Modules\Installer\Traits\InstallerTrait;

class SetupMiddleware
{
    use InstallerTrait;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        $this->ensureAppKeyExists();

        $isInstalled = $this->isAppInstalled();

        if($request->is('installer/*')) {
            return $isInstalled ? redirect()->route('home') : $next($request);
        }


        if(!$isInstalled){
            return redirect()->route('installer.welcome');
        }


        return $next($request);
    }


    protected function ensureAppKeyExists(): void
    {
        if (empty(config('app.key'))) {
            Artisan::call('key:generate');
            Artisan::call('config:cache');
        }
    }
}

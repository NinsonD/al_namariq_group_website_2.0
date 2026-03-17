<?php

namespace Modules\Installer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Modules\Installer\Models\Configuration;
use Modules\Installer\Traits\InstallerTrait;

class SystemRequirementsMiddleware
{
    use InstallerTrait;
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

        if($this->isRequirementsPassed()){
            session()->put('requirements', true);
            return $next($request);
        }else{
            session()->has('database_migrated') && session()->forget('database_migrated');
            session()->has('requirements') && session()->forget('requirements');

            if(Schema::hasTable('configurations')){
                Configuration::updateSetupStatus(1);
            }
            return redirect()->route('installer.requirements');
        }

    }
}

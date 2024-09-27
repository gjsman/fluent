<?php

namespace App\Http\Middleware;

use Closure;
use Composer\InstalledVersions;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Symfony\Component\HttpFoundation\Response;

class Setup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Livewire::isLivewireRequest()) {
            return $next($request);
        }

        if ($request->path() !== 'setup') {
            if (! InstalledVersions::isInstalled('livewire/flux-pro')) {
                return redirect()->route('setup');
            }
        }

        return $next($request);
    }
}

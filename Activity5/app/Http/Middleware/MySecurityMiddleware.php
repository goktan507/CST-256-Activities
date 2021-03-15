<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class MySecurityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        Log::info("Entering MySecurityMiddleware in handle() at path: " . $path);
        $secureCheck = true;
        if($request->is('/') || $request->is('login') || $request->is('doLogin') || $request->is('usersrest') || $request->is('usersrest/*')){
            $secureCheck = false;    
        }
        Log::info($secureCheck ? "MySecurityMiddleware in handle()... Neeeds Security" : "MySecurityMiddleware in handle()... No Security Required");
        Log::info("This is the session in middleware: " . session()->get('security'));
        if(session()->get('security') == 'enabled'){
            return $next($request);
        }
        if($secureCheck){
            Log::info("Leaving MySecurityMiddleware in handle() doing a redirect back to login");
            return redirect('/login');
        }
        return $next($request);
    }
}

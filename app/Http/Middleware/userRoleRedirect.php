<?php

namespace App\Http\Middleware;

use Closure;

class userRoleRedirect
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
        switch (auth()->user()->role){
            case 1:
                return redirect('admin/dashboard');
            case 4:
                return redirect('student/dashboard');
            case 2:
                return redirect('assessor/dashboard');
            case 3:
                return redirect('moduleOwner/dashboard');
            case 5:
                return redirect('supervisor/dashboard');

            default:
                break;
        }

        return $next($request);
    }
}

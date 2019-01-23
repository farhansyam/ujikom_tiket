<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Petugas
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
      $user = auth::user();
      if ($user) {
        if ($user->role==2) {
          return $next($request);
        }
        else {
          abort(404);
        }
      }
      else {
        return redirect('/login');
      }
    }
}

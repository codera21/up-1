<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class CheckActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$request->ajax()) {

            //  for user goal
            if ($user->is_active == 'NO' and (!in_array($request->route()->uri, ['user/{username}/goal']))) {
                // if user has filled up user goals show
                if ($request->route()->uri == 'user/{username}') {
                    // if user goals is filled up then show active
                    $userGoal = DB::table('user_goals')
                        ->where('user_id', $user->id)
                        ->first();

                    if ($userGoal) {
                        return redirect('/active');
                    } else {
                        return $next($request);
                    }
                }
                return redirect('/active');
            }
        }
        return $next($request);
    }
}

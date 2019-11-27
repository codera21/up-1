<?php

namespace App\Http\Middleware;

use Closure;

class pageSite
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$slug = $request->route('slug');
		if($slug == 'admin-certificat-filling-page'){
			//set by default french
			\Session::put('locale','fr');
		  
		}
		if($slug == 'admin-certificate-filling-page'){
			//set by default english
			\Session::put('locale','en');
		 
		} 
		
        if (!isset($_GET["id"])) {
            $url = $request->url();
            $url = $url . "?id=";
            return redirect($url);
        }

        return $next($request);
    }
}

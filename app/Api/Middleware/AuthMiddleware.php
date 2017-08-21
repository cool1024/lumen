<?php namespace App\Api\Middleware;

use App\Api\Contracts\AuthContract;

class AuthMiddleware {

    private $auth;

    public function _construct(AuthContract $auth){
        $this->auth=$auth;
    }

	/**
	 * Run the request filter.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->input('age') < 200) {
			return redirect('home');
		}

		return $next($request);
	}

}

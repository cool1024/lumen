<?php namespace App\Api\Middleware;

use App\Api\Contracts\AuthContract;
use App\Api\Contracts\ApiContract;
use Closure;

class AuthMiddleware
{

    private $auth;
    private $api;

    public function __construct(AuthContract $auth, ApiContract $api)
    {
        $this->auth=$auth;
        $this->api=$api;
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
        $secret=$request->header('ng-params-one');
		$token=$request->header('ng-params-two');
		
        if (isset($secret, $token)==false) {
            return $this->api->error('token undefiend');
		}
		
        if($this->auth->check($secret,$token)==false){
			return $this->api->error('token error');
		}

        return $next($request);
    }
}

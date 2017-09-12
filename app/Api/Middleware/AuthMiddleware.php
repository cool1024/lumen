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
        $this->auth = $auth;
        $this->api = $api;
    }

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = 'default')
    {
        //尝试获取权限令牌
        $secret = $request->header('ng-params-one');
        $token = $request->header('ng-params-two');
        
        //判断头部参数是否存在
        if (isset($secret, $token) == false) {
            return response($this->api->error('token undefiend'), 401);
        }

        //校验权限令牌
        if ($this->auth->check($secret, $token) == false) {
            return response($this->api->error('token error'), 401);
        }
        
        //校验是否具有权限钥匙
        if ($permission != 'default' && !$this->auth->hasPermission($permission)) {
            return response($this->api->error('permission error'), 401);
        }

        return $next($request);
    }
}

<?php

namespace Laraerp\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Request;


class Permission implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($this->userHasAccessTo($request)) {

            view()->share('currentUser', $request->user());

            return $next($request);
        }

        return redirect()->route('home');
    }

    /*
      |--------------------------------------------------------------------------
      | Additional helper methods for the handle method
      |--------------------------------------------------------------------------
     */

    /**
     * Checks if user has access to this requested route
     * 
     * @param  Request  $request
     * @return Boolean true if has permission otherwise false
     */
    protected function userHasAccessTo($request) {
        return $this->hasPermission($request);
    }

    /**
     * hasPermission Check if user has requested route permimssion
     * 
     * @param  Request $request
     * @return Boolean true if has permission otherwise false
     */
    protected function hasPermission($request) {
        $required = $this->requiredPermission($request);

        return !$this->forbiddenRoute($request) && $request->user()->can($required);
    }

    /**
     * Extract required permission from requested route
     * 
     * @param  Request  $request
     * @return String permission_slug connected to the Route
     */
    protected function requiredPermission($request) {
        $action = $request->route()->getAction();

        return isset($action['permission']) ? explode('|', $action['permission']) : null;
    }

    /**
     * Check if current route is hidden to current user role
     * 
     * @param  Request $request
     * @return Boolean true/false
     */
    protected function forbiddenRoute($request) {
        $action = $request->route()->getAction();

        if (isset($action['except'])) {

            return $action['except'] == $request->user()->role->role_slug;
        }

        return false;
    }

}

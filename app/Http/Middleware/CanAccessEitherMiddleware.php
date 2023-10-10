<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;


class CanAccessEitherMiddleware
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   public function handle($request, Closure $next, ...$permissions)
    {
        
        $user = $this->auth->user();
        $roles = $user->roles;

        // foreach($roles as $role) {
        //     foreach ($permissions as $permission) {
        //         if ($role->hasPermissionTo($permission)) {
        //             return $next($request);
        //         }
        //     }
        // }
        // dd($request->input('token'));
        foreach ($permissions as $permission) {

        // $response = Http::withOptions([
        //     'verify' => env('CERT_PATH')
        // ])->post(env('API_URL') .'api/auth/validatePermission', [
        //     'id' => Session::get('user_id'),
        //     'permissions' => $permissions,
        // ]);

        // // foreach ($permissions as $permission) {
        // //     if ($user->hasAnyDirectPermission($permission)) {
        // //         return $next($request);
        // //     }
        // // }
        
        // if($response->getStatusCode() != 200) {
        //     abort(403, 'Unauthorized action.');
        // } else {
        //     return $next($request);
        // }

            return $next($request);
        }
    }
}
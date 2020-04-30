<?php

namespace App\Http\Middleware;

use Closure;

use App\Http\Controllers\SessionsController;

class TokenMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if (!SessionsController::checkToken($request->headers->get('Meu-Token'))) {
            return SessionsController::noToken();
        }

        $response = $next($request);

        if (rand(1, 10) == 3) {
            $token = SessionsController::newToken($request->headers->get('Meu-Token'));
        } else {
            $token = $request->headers->get('Meu-Token');
        }

        $response->headers->set('Meu-Token', $token);
        
        return $response;
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class API_authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check for Token if exists
        $token = $request->header('api_token');
        if ($token == null) {
            return  response()->json(['msg' => 'The api_token header is required'], 422);
        }

        $user = DB::table('users')->select('id')->where('api_token', '=', hash('sha256', $token))->get();
        if ($user->isEmpty()) {
            return  response()->json(['msg' => 'The entered api_token doesn\'t exist'], 422);
        }
        $user_id = get_object_vars($user[0])['id'];
        $request->attributes->add(['user_id' => $user_id]);

        return $next($request);
    }
}

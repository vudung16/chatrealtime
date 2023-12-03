<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token = $request->bearerToken();
            $user = JWTAuth::toUser(JWTAuth::setToken($token)->getPayload());
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản chưa đăng nhập'
                ], 401);
            }

            $user = User::where('id', $user->id)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không tìm thấy thông tin tài khoản'
                ], 401);
            }

            return $next($request);
        } catch (\Exception $e) {
            Log::info($e);
            return response()->json([
                'status' => false,
                'message' => 'Lỗi hệ thống'
            ], 401);
        }
    }
}

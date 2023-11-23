<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::create($data);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Регистрация успешна.',
            'user' => $user,
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ], 201);
    }

    public function login(AuthRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {

            $user = User::query()
                ->where('email', '=', $data['email'])->with(['profession', 'tasks'])
                ->first();

            if (!$user) {
                throw new BadRequestException('Пользователь не найден');
            }

            if (!$token = JWTAuth::fromUser($user)) {
                throw new BadRequestException('Failed');
            }

            return response()->json([
                'token' => $token
            ], 200);

        } catch (Exception $exception) {

            return response()->json([
                'error' => $exception->getMessage()
            ]);

        }

    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json([
            'message' => 'Выход произведен успешно.'
        ], 200);
    }

    public function refreshToken(): JsonResponse
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            throw new BadRequestException('Отсутствует токен.');
        }

        try {
            $token = JWTAuth::refresh($token);
        } catch (TokenInvalidException $e) {
            throw new AccessDeniedException($e->getMessage());
        }

        return response()->json([
            'token' => $token
        ], 200);
    }
}

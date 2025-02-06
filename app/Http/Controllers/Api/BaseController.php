<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public static function successResponse($data, int $code = 200, string $message = ''): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message
        ];
        return response()->json($response, $code);
    }

    public static function errorResponse(int $code = 500, array $errors = []): JsonResponse
    {
        $response = [
            'success' => false,
            'errors'  => $errors
        ];
        return response()->json($response, $code);
    }
}

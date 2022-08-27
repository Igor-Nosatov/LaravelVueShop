<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    protected function createResponse(array $data, string $message, int $status = JsonResponse::HTTP_CREATED): JsonResponse
    {
        return new JsonResponse(['message' => $message, 'status' => $status, 'data' => $data, ]);
    }

    protected function successPaginationResponse( array $meta, array $data, string $message, int $status = JsonResponse::HTTP_OK,): JsonResponse
    {
        return new JsonResponse(['message' => $message, 'status' => $status,'meta'=> $meta, 'data' => $data, ]);
    }

    protected function successResponse(  array $data,string $message, int $status = JsonResponse::HTTP_OK): JsonResponse
    {
        return new JsonResponse(['message' => $message, 'status' => $status, 'data' => $data, ]);
    }

    protected function emptyResponse(string $message, int $status = JsonResponse::HTTP_NO_CONTENT): JsonResponse
    {
        return new JsonResponse($message, $status);
    }
}

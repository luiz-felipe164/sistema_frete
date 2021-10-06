<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function response($message, $code = 200): JsonResponse
    {
        return response()->json(['message' => $message], $code);
    }

    public function responseError($code, $message = null): JsonResponse
    {
        $data = [
            'message' => is_null($message) ? 'Ocorreu um erro desconhecido.' : $message, 
            'code' => $code
        ];

        return $this->response($data, 500);
    }
}

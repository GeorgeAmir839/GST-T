<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

trait ApiResponse
{
    public function apiResponse($data = null, $message = null, $statusCode = 200)
    {

        $response =
            [
                'data'    => $data,
                'message' => $message,
                'status'  => true,
            ];
        return Response::json($response, $statusCode);
    }
    public function sendError($error = null, $message = null, $statusCode = 404)
    {
    	$response = [
            'data'    => $error,
            'message' => $message,
            'status'  => false,
        ];
        return Response::json($response, $statusCode);
    }
}

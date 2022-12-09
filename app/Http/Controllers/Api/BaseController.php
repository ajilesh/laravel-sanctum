<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($message = '',$data)
    {
     $response = [
        'status' => 200,
        'message' => $message,
        'data' => $data
     ];
     return response()->json($response);
    }
    public function sendError($message)
    {
        $response = [
            'error' => $message,
            'status' => 404
        ];
        return response()->json($response);
    }
}

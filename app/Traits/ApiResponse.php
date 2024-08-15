<?php


namespace App\Traits;

trait ApiResponse
{
    protected function ok($data)
    {
        return response()->json([
            "status" => 200,
            "data" => $data
        ], 200);
    }

    protected function created($data)
    {
        return response()->json([
            "status" => 201,
            "data" => $data
        ]);
    }

    protected function badRequest($errors, $message = "One or more fields in your request is not valid")
    {
        return response()->json([
            "status" => 400,
            "message" => $message,
            "errors" => $errors,
        ]);
    }

    protected function notAuthorized($message = "You are not authorized to make this requests")
    {
        return response()->json([
            "status" => 401,
            "message" => $message
        ]);
    }
}

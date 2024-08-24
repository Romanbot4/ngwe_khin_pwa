<?php


namespace App\Traits;

use Illuminate\Http\Response;

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
        ], 201);
    }

    protected function deleted($message = null)
    {
        return response()->json([
            "status" => 204,
            "message" => $message ?? "Successfully deleted",
        ], 200);
    }

    protected function badRequest($errors, $message = "One or more fields in your request is not valid")
    {
        return response()->json([
            "status" => 400,
            "message" => $message,
            "errors" => $errors,
        ], 400);
    }

    protected function notAuthorized($message = "You are not authorized to make this requests")
    {
        return response()->json([
            "status" => 401,
            "message" => $message
        ], 401);
    }

    protected function notFound($message = "Content you are trying to delete doesn't exists.")
    {
        return response()->json([
            "status" => 404,
            "message" => $message
        ], 404);
    }
}

<?php

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class TokenInvalidException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            "success"    =>  false,
            "message" => "Token invalido",
            "status" => 403
        ], 403);
    }
}

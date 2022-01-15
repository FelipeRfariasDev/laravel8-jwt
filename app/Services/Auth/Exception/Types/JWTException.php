<?php

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;

class JWTException implements IExceptionResponse
{
    public function response()
    {
        return response()->json([
            'response' => 'Favor informar o Token'
        ], 400);
    }
}

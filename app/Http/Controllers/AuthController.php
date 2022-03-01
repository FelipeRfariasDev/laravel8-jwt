<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                "success"    =>  false,
                "message"   =>  "Usuário e senha não encontrado",
                "status"    =>  401,
            ],401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            "success"    =>  true,
            "message"   =>  "Successfully logged out",
            "status"    =>  200,
        ],200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $dateTime = new \DateTime();

        $dateTimeInitial = $dateTime->setTimestamp($dateTime->getTimestamp());
        $dateTimeTnitialFormatada = $dateTimeInitial->format('Y-m-d H:i:s');

        $dataTimeFinal = $dateTime->setTimestamp($dateTime->getTimestamp()+3600);
        $dataTimeFinalFormatada = $dataTimeFinal->format('Y-m-d H:i:s');

        return response()->json([
            'accessToken' => $token,
            'tokenType' => 'Bearer',
            'expiresInSeconds' => auth()->factory()->getTTL() * 3600,
            'expiresInMinutes' => 60,
            'dateTimeInitial' => $dateTimeTnitialFormatada,
            'dateTimeFinal' => $dataTimeFinalFormatada,
            'dateTimeStampInitial' => $dateTime->getTimestamp(),
            'dateTimeStampFinal' => $dateTime->getTimestamp()+3600
        ]);
    }
}

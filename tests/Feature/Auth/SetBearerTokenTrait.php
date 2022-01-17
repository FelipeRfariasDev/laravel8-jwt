<?php

namespace Tests\Feature\Auth;

use App\Models\Users;
use Tymon\JWTAuth\Facades\JWTAuth;

trait SetBearerTokenTrait
{
    protected $token = '';
    protected $credentials = [];

    public function getToken() : array
    {
        $user = Users::where('email', config('env.API_USER_EMAIL'))->first();
        $this->token = JWTAuth::fromUser($user);

        return [
            "Authorization" => "Bearer {$this->token}"
        ];
    }
}

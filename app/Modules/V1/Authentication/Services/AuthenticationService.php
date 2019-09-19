<?php

namespace App\Modules\V1\Authentication\Services;

use App\Models\V1\User;
use App\Models\V1\Device;
use \Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use DB;
use Faker\Factory as Faker;

class AuthenticationService
{
    /**
     * Authenticate
     *
     * @param array $data Request data
     *
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function authenticate(array $data)
    {
        $credentials = [
            'email' => $data['username'],
            'password' => $data['password']
        ];
        return $this->checkAuth($credentials);
    }

    /**
     * Check Auth
     *
     * @param array $credentials credentials
     *
     * @return \App\Modules\Traits\json
     */
    public function checkAuth(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $objToken = $user->createToken(config('token.token.key'));
            $token = $objToken->accessToken;
            return [
                'data' => [
                    'access_token' => $token,
                    "token_type"    => 'Bearer',
                    "expires_in"    => $objToken->token->expires_at->diffInSeconds(Carbon::now()),
                    ]
            ];
        }
        throw new AuthenticationException(trans('auth.errors.login-unauthenticated'));
    }

    /**
     * Get Token
     *
     * @param array $data Request data
     *
     * @return \App\Modules\Traits\json
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function getToken(array $data)
    {
        $requestDevice = [
            "device_type" => $data['device_type'],
            "device_token" => $data['device_token']
        ];
        $device = Device::where($requestDevice)->first();
        if (empty($device)) {
            DB::beginTransaction();
            try {
                $faker = Faker::create();
                $user = User::create([
                    "email" => $faker->unique()->email,
                    "password" => Hash::make('device'),
                    "name" => "device"
                ]);

                $requestDevice['user_id'] = $user->id;
                $device = Device::create($requestDevice);
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
            DB::commit();
        }

        $user = $device->user;
        $credentials = [
            'email' => $user->email,
            'password' => 'device'
        ];
        return $this->checkAuth($credentials);
    }
    /**
     * Get current user
     *
     * @return mixed
     */
    public static function currentUser()
    {
        try {
            $user = Auth::user();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            $user = null;
        }

        return $user;
    }
}

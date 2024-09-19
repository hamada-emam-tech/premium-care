<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'uid' => [
                'required',
                'email',
                Rule::exists(Customer::class, 'uid'),
            ],
            'password' => [
                'required',
                Password::min(6),
            ],
        ]);
        /** @var Customer */
        $customer = Customer::where('uid', $request->uid)->first();
        if ($customer) {
            if (! $customer->active) {
                // throw new GraphQLException('1', 'Email not verified', 'LOGIN');
            }
            if (! $customer || ! Hash::check($request->password, $customer->password)) {
                // throw new GraphQLException('1', 'The provided credentials are incorrect.', 'authentication');
            }

            $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
            $success['name'] =  $customer->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], JsonResponse::HTTP_UNAUTHORIZED);
        }
    }
}

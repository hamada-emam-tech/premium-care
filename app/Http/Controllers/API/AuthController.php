<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'nid' => [
                'required',
                Rule::exists(Customer::class, 'nid'),
            ],
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation_error', $validator->errors(), JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        /** @var Customer */
        $customer = Customer::where('nid',  $request->nid)->first();

        if ($customer) {
            if (! $customer->active) {
                return $this->sendError('inactive_account', ['error' => 'Customer is inactive'], JsonResponse::HTTP_UNAUTHORIZED);
            }
            if (! $customer || ! Hash::check($request->password, $customer->password)) {
                return $this->sendError('credentials_error', ['error' => 'There is an error credentials'], JsonResponse::HTTP_UNAUTHORIZED);
            }

            $success['token'] =  $customer->createToken('MyApp')->plainTextToken;
            $success['name'] =  $customer->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], JsonResponse::HTTP_UNAUTHORIZED);
        }
    }
}

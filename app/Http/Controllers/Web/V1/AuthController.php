<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verifyWorkEmail(Request $request)
    {
        try{

            $rules = [
                'email' => 'required|email',
                'first_name' => 'required|string|max:50', // Limiting first name to 50 characters
                'last_name' => 'required|string|max:50', // Limiting last name to 50 characters
            ];
            
            $messages = [
                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please provide a valid email address.',
                'first_name.required' => 'Please enter your first name.',
                'last_name.required' => 'Please enter your last name.',
                'first_name.max' => 'The first name should not exceed 50 characters.',
                'last_name.max' => 'The last name should not exceed 50 characters.',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return jsonResponse::error($validator->errors()->first(),['validationError'=>$validator->errors()]);
            }

        }catch(Exception $e)
        {
            
        }
    }
}

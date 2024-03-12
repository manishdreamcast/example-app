<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\JsonResponseHandler;
use App\Helpers\StatusCode;
use App\Models\User;
use Validator;
class AuthController extends Controller
{
    public function verifyWorkEmail(Request $request)
    {
        try{

            $rules = [
                'email' => 'required|email',
                'first_name' => 'required|string|max:50', // Limiting first name to 50 characters and allowing only alphabetic characters
                'last_name' => 'required|string|max:50', // Limiting last name to 50 characters and allowing only alphabetic characters
            ];
            
            $messages = [
                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please provide a valid email address.',
                'first_name.required' => 'Please enter your first name.',
                'last_name.required' => 'Please enter your last name.',
                'first_name.max' => 'The first name should not exceed 50 characters.',
                'last_name.max' => 'The last name should not exceed 50 characters.',
                // 'first_name.regex' => 'The first name should contain only alphabetic characters.',
                // 'last_name.regex' => 'The last name should contain only alphabetic characters.',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            if ($validator->fails()) {
                return JsonResponseHandler::error($validator->errors()->first(), ['validationError' => $validator->errors()]);
            }

            $findEmail =  User::where('email',trim($request->email))->first();
            
            if(!empty($findEmail->id))
            {
                return JsonResponseHandler::error('Email is already exists!');
            }



            return JsonResponseHandler::success('Success',['email'=>$request->email,'first_name'=>$request->first_name,'last_name'=>$request->last_name]);



        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return JsonResponseHandler::error(StatusCode::getMessage(StatusCode::HTTP_INTERNAL_SERVER_ERROR),[],StatusCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function registerNewUser(Request $request)
    {
        try{

            $rules = [
                'email' => 'required|email',
                'first_name' => 'required|string|max:50', // Limiting first name to 50 characters and allowing only alphabetic characters
                'last_name' => 'required|string|max:50', // Limiting last name to 50 characters and allowing only alphabetic characters
                'country_code'=>'required|max:10',
                'phone'=>'required|max:20',
                'company'=>'required|max:10',
                'country_code'=>'required|max:10',
            ];
            
            $messages = [
                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please provide a valid email address.',
                'first_name.required' => 'Please enter your first name.',
                'last_name.required' => 'Please enter your last name.',
                'first_name.max' => 'The first name should not exceed 50 characters.',
                'last_name.max' => 'The last name should not exceed 50 characters.',
                // 'first_name.regex' => 'The first name should contain only alphabetic characters.',
                // 'last_name.regex' => 'The last name should contain only alphabetic characters.',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            if ($validator->fails()) {
                return JsonResponseHandler::error($validator->errors()->first(), ['validationError' => $validator->errors()]);
            }

            $findEmail =  User::where('email',trim($request->email))->first();
            
            if(!empty($findEmail->id))
            {
                return JsonResponseHandler::error('Email is already exists!');
            }



            return JsonResponseHandler::success('Success',['email'=>$request->email,'first_name'=>$request->first_name,'last_name'=>$request->last_name]);



        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return JsonResponseHandler::error(StatusCode::getMessage(StatusCode::HTTP_INTERNAL_SERVER_ERROR),[],StatusCode::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

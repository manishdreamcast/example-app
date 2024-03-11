<?php
namespace App\Libraries;
class JsonResponseHandler {

    public static function success($message='SUCCESS',$data=array()) {
        return self::jsonResponse($data, $message, 200);
    }

    public static function error($message='ERROR',$data=array(), $code = 400) {
        return self::jsonResponse($data, $message, $code);
    }

    private static function jsonResponse($data, $message, $code) {
        $response = [
            'status' => $code,
            'message' => $message,
            'data'=>$data ?? new \stdClass()
        ];


        // http_response_code($code);
        // header('Content-Type: application/json');
        // return json_encode($response);

        return response()->json($response, $code);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public $baseController;
    function __construct(BaseController $baseController)
    {
        $this->baseController = $baseController;
    }
    public function Login(REQUEST $request)
    {
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($auth)
        {
            
            $user = Auth::user();
            $message['success'] = 'Login Successfull !!!';
            $message['token'] = $user->createToken('MyLogin')->plainTextToken;
            $data['data'] = $user;
            return $this->baseController->sendResponse($message,$data);
            
        }
        else{
            $message = 'Wrong Login Credential !!!';
            return $this->baseController->sendError($message);
        }
    }
    public function logOut()
    {
        $user_id = auth()->user()->id;
        //echo $user_id;
         $user = User::find($user_id);
         $user->tokens()->delete();
    }
}

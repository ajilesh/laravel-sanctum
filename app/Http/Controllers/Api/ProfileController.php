<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Controllers\Api\BaseController;

class ProfileController extends Controller
{
    public $profile;
    function __construct(BaseController $baseController)
    {
        $this->profile = $baseController;
    }
    public function index()
    {
        $profilecount = Profile::all()->count();
        if($profilecount > 0)
        {
            $data = Profile::all();
            $message = '';
            return $this->profile->sendResponse($message,$data);
        }
        else
        {
            $message = 'Profile Data Is Empty';
            return $this->profile->sendError($message);
        }
    }
    public function fetchProductId($id)
    {
        
        
        if(Profile::where('id', '=' , $id)->count() > 0)
        {
            $message = '';
            $data = Profile::findOrFail($id);
            return $this->profile->sendResponse($message,$data);
        }
        else{
            $message = 'Profile Data Not Found';
            return $this->profile->sendError($message);
        }
    }
}

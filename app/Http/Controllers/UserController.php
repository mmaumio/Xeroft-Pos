<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Redirect, \Validator, \Session;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function index(){
        return view('changepass');
    }

    public function admin_credential_rules(array $data)
    {
      $messages = [
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }  

    public function postCredentials(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {  
                 
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save(); 
            return redirect()->to('/');
        }        
      }
      else
      {
        return redirect()->to('/my-account');
      }    
    }
    
}

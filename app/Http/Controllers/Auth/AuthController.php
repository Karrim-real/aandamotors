<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    //check Middleware
    // public function __construct()
    // {
    //     $this->middleware('guest')->except(['logoutDestroy']);
    // }
        //Show Login Page
        public function showLogin()
        {
            return view('frontend.login');
        }

        //Post Request For Login
        public function StoreLogin(Request $request)
        {
            $userFields = $request->validate([
                'email'=> 'required',
                'password'=> 'required',
            ]);

            if(!auth()->attempt($userFields)){
                return response()->json([
                    'status' => 'error',
                    'message'=> "Incorrect Credential, Please check your details and try again"]);
            }else{
                auth()->attempt($userFields);
                return response()->json([
                    'status' => 'success',
                    'message' => 'You have successfully Login',
                     'url'=> '/dashboard']);
            }

        }

        //Register Route

        public function showRegister()
        {
            return view('frontend.register');
        }

        public function storeRegister(Request $request)
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'required',
                'address' => 'required',
                'password' => 'required',
            ]);

            if($validator->fails()){
                // dd($fields->errors());
                return response()->json(['status'=> 'error', 'message' => 'The email has already been taken.']);

            }else{
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'address' => $request->input('address'),
                    'password' => bcrypt($request->input('password')),
                ]);

                if($user){
                    $url = '/dashboard';
                    auth()->login($user);
                    return response()->json(['status' => 'success', 'message'=> "You have successfully register ", 'url' => $url]);

                }else{
                    return response()->json([
                        'status' => 'error',
                        'message'=> "An error occour while proccessing request, Please try again, Thanks"
                    ]);
                }
            }
            // return response()->json(['status' => $fields]);
        }

public function logoutDestroy()
{
    auth()->logout();
   return redirect('/');
}

}

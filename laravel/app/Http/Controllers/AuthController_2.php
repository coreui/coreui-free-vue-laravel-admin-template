<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{    
    public function register(Request $request){
        $validate = Validator::make($request->all(), [
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:4|confirmed',
        ]);        
        if ($validate->fails()){
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ], 422);
        }        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();       
        return response()->json(['status' => 'success'], 200);
    }    
    

    /*
        Controller return api key
    */
    public function login(Request $request){
        //$credentials = $request->only('email', 'password');
        //if (Auth::attempt($credentials)) {
            /*
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()
            ->json(['status' => 'success'], 200);
        }
        return response()->json(['error' => 'login_error'], 401);
        */
        /*
        $credentials = $request->only('email', 'password');        
        if ($token = $this->guard()->attempt($credentials)) {
            return response()
            ->json(['status' => 'success'], 200)
            ->header('Authorization', $token);
        }        
        return response()->json(['error' => 'login_error'], 401);
        */

        $user = User::where('email', $request->email)->first();
        if($user){
            if(\Hash::check($request->password, $user->password)){
                $token = Str::random(60) . microtime();
                $user->api_token = hash('sha256', $token);
                $user->save();
                //Auth::loginUsingId($user->id, TRUE);
                //Auth::login($user);
                Auth::login($user);
                return ['api_token' => $token, 'user_id' => $user->id, 'status' => 'success'];
                //return response()->json(['status' => 'success'], 200);
            }
        }
        return response()->json(['error' => 'login_error'], 401);


    }    
    
    public function logout(Request $request){
        $user = User::where('id', $request->get('user_id'))->first();
        $user->api_token = '';
        $user->save();
        Auth::logout();
    }    
    
    public function user(Request $request){
        $user = User::find(Auth::user()->id);        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }    
    
    public function refresh(){
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }        
        return response()->json(['error' => 'refresh_token_error'], 401);
    }    
    
    private function guard(){
        return Auth::guard();
    }
}
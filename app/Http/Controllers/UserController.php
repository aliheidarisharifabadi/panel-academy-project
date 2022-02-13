<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails())
        {

            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }


        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {

            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('panel',['user'=>Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'username' => 'required|unique:users',
            'code' => 'required|unique:users',
            'password' =>  'required|string|min:8|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(),'status' => 400], 400);
        }

        $input = $request->only(['username', 'password','code','name']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
       return $user;

    }

    public function postRequest()
    {
        return redirect("login");
    }

}

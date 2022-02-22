<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function insert()
    {
        if (Auth::check()) {
            return view('insert', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {

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
        if (Auth::check()) {
            return view('panel', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function logout()
    {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function postRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'code' => 'required|unique:users',
            'password' => 'required|string|min:8|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
        }


        $input = $request->only(['username', 'password', 'code', 'first_name', 'last_name']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect()->back()->with('message', 'با موفقیت ثبت شد.');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'code' => 'required|unique:users',
            'password' => 'required|string|min:8|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
        }

        $input = $request->only(['username', 'password', 'code', 'first_name', 'last_name']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $user;

    }

    public function postRequest(Request $request)
    {

        \App\Models\Request::create([
            'user-id' => (int)$request->user,
            'category-id' => (int)$request->cat
        ]);

        return redirect()->back()->with('message', 'درخواست شما با موفقیت ثبت شد.');

    }

    public function allrequest()
    {
        if (Auth::check()) {
            return view('allrequest', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function req(Request $request,$cat)
    {

        if (Auth::check()) {
            return view('cat', ['user' => Auth::user(),'cat'=>explode('_', $cat)[1]]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }
}

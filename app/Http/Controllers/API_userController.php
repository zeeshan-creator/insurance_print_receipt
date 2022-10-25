<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class API_userController extends Controller
{
    public function index()
    {
        // return User::all();
    }

    public function store(Request $request)
    {
        $first_name =      $request->input('first_name');
        $last_name =      $request->input('last_name');
        $email =      $request->input('email');
        $password =      $request->input('password');

        // Validate
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return  response()->json(['msg' => $validator->messages('*')], 422);
        }

        $ifEmailExists = DB::table('users')->where('email', '=', $email)->get();

        if (!$ifEmailExists->isEmpty()) {
            return  response()->json(['msg' => 'Email already exists!'], 422);
        }

        $data = new User();
        $api_token = Str::random(60);
        $data['api_token']  = hash('sha256', $api_token);
        $data['first_name']  = $first_name;
        $data['last_name']   = $last_name;
        $data['email']       = $email;
        $data['password']    = Hash::make($password);
        $data->save();

        $res = [
            'msg' => 'sign up successfull!',
            'Api_token' => $api_token,
            'Description' => 'Copy this api_token to use the APIs.'
        ];

        return  response()->json($res, 201);
    }

    public function show(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return  response()->json(['msg' => $validator->messages('*')->first()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = DB::table('users')->select('id', 'first_name', 'last_name', 'email', 'api_token')->where('id', '=', Auth::id())->get();
            return response()->json($user, 200);
        }

        return response()->json(['msg' => 'Email/Password not correct!'], 404);
    }

    public function update(Request $request)
    {
        $first_name =      $request->input('first_name');
        $last_name =      $request->input('last_name');
        $email =      $request->input('email');
        $password =      $request->input('password');

        // Check for Token if exists
        $token = $request->header('api_token');
        if ($token == null) {
            return  response()->json(['msg' => 'The api_token header is required'], 422);
        }

        $user = DB::table('users')->select('id')->where('api_token', '=', hash('sha256', $token))->get();
        if ($user->isEmpty()) {
            return  response()->json(['msg' => 'The entered api_token doesn\'t exist'], 422);
        }

        $ifEmailExists = DB::table('users')->where('email', '=', $email)->get();

        if (!$ifEmailExists->isEmpty()) {
            return  response()->json(['msg' => 'Email already exists!'], 422);
        }

        $user_id = $user[0]->id;

        try {
            $data = User::findOrFail($user_id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'User doesn\'t exist'], 404);
        }

        $data['first_name']  = isset($first_name) ? $first_name : $data['first_name'];
        $data['last_name']   = isset($last_name) ? $last_name : $data['last_name'];
        $data['email']       = isset($email) ? $email : $data['email'];
        $data['password']    = isset($password) ? Hash::make($password) :  $data['password'];
        $data->save();

        return response()->json(['msg' => 'Updated successfully!'], 202);
    }

    public function destroy($id)
    {
        // $User = User::findOrFail($id);
        // $User->delete();

        // return response()->json(null, 204);
    }
}

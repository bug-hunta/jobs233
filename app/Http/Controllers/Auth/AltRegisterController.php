<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AltRegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('api');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6',],
            'preference' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => ucfirst(trim($request['firstName'])) . " " . ucfirst(trim($request['lastName'])),
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if ($user) {
            $profile = Profile::create([
                'user_id' => $user->id,
                'preference' => $request['preference'],
            ]);

            if ($profile) {
                return response()->json(['success' => true, 'message' => 'The user was created successfully'], 200);
            }
        } else {
            Log::debug("there seems to be an issue with user creation. you may have to check the database");
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }

    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6',],
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            Profile::create([
                'user_id' => $user->id,
                'preference' => $data['preference'],
            ]);
        }

        return $user;
    }
}

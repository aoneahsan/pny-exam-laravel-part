<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\UserDetails;

use App\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_role' => ['required', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_role' => $data['user_role']
        ]);

        if ($data['user_role'] === 'super_admin') {
            $user->roles()->attach(Role::where('name', 'super_admin')->first());
        }
        elseif($data['user_role'] === 'admin') {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        elseif($data['user_role'] === 'student') {
            $user->roles()->attach(Role::where('name', 'student')->first());
        }
        else {
            $user->roles()->attach(Role::where('name', 'student')->first());
        }
        UserDetails::create([
            'user_id' => $user->id,
            'profile_image' => 'user.png'
        ]);
        return redirect('/')->with('signup_success','You have Successfully Signed Up!');
        // return $user;
    }

    public function registerApi(Request $request)
    {
        // dd($request->toArray());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'user_role' => $request->user_role
        ]);

        if ($request->user_role === 'super_admin') {
            $user->roles()->attach(Role::where('name', 'super_admin')->first());
        }
        elseif($request->user_role === 'admin') {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        elseif($request->user_role === 'student') {
            $user->roles()->attach(Role::where('name', 'student')->first());
        }
        else {
            $user->roles()->attach(Role::where('name', 'student')->first());
        }
        UserDetails::create([
            'user_id' => $user->id,
            'profile_image' => 'user.png',
            'zip_code' => $request->zip_code
        ]);
        $user->setToken();
        $user->setTokenExpireDate();
        $new_user = User::where('id', $user->id)->with('user_details')->with('roles')->first();
        // return redirect('/')->with('signup_success','You have Successfully Signed Up!');
        return response()->json([
            'data' => new UserResource($new_user)
        ]);
    }
}
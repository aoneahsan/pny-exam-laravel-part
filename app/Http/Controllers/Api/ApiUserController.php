<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Role;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class ApiUserController extends Controller
{
    
    public function allUsers()
    {
    	// dd($request->toArray());
        // $user = User::where('id', $request->id)->first();
    	$users = User::where("id", "!=", 1)->get();
    	// if ($user->api_token === $request->token) {
    	// 	return response()->json([
    	// 		'data' => $users->toArray()
    	// 	]);
    	// }
        return response()->json([
            'data' => $users->toArray()
        ]);
    	
    }

    public function localGetUserData()
    {
        $user = User::where('id', 1)->with('user_details')->with('roles')->first();
        return new UserResource($user);
    }

    public function getUserData(Request $request)
    {
        // dd($request->toArray());
        $user = User::where('id', $request->id)->with('user_details')->with('roles')->first();
        // if ($user->api_token === $request->token) {
            return response()->json([
                'data' => new UserResource($user)
            ]);
        // } else {
        //     return response()->json([
        //         'error' => "Session Out"
        //     ]);
        // }
        
    }

    public function addUser(Request $request)
    {
        // dd($request->toArray());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password)
        ]);

        if ($request->user_role === 'admin') {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        elseif($request->user_role === 'franchise') {
            $user->roles()->attach(Role::where('name', 'Franchise')->first());
        }
        elseif($request->user_role === 'client') {
            $user->roles()->attach(Role::where('name', 'Client')->first());
        }
        UserDetails::create([
            'user_id' => $user->id,
            'profile_image' => 'user.png'
        ]);
        $user->setToken();
        $user->setTokenExpireDate();
        return response()->json([
            'data' => "Created"
        ]);
        
    }

    public function editUserData(Request $request)
    {
        // dd($request->toArray());
        $user = User::where('id', $request->userId)->first();
        $user_details = UserDetails::where('user_id', $request->userId)->first();
        User::where('id', $request->userId)->update([
            'name' => $request->name != null ? $request->name : $user->name,
            // 'email' => $request->email != null ? $request->email : $user->email,
            'phone_number' => $request->phone_number != null ? $request->phone_number : $user->phone_number
        ]);        

        UserDetails::where('user_id',$request->userId)->update([
            'profession' => $request->profession != "" ? $request->profession : $user_details->profession,
            'mariage_status' => $request->mariage_status != null ? $request->mariage_status : $user_details->mariage_status,
            'gender' => $request->gender != null ? $request->gender : $user_details->gender,
            'date_of_birth' => $request->date_of_birth != null ? $request->date_of_birth : $user_details->date_of_birth,
            'zip_code' => $request->zip_code != null ? $request->zip_code : $user_details->zip_code,
            'address' => $request->address != null ? $request->address : $user_details->address,
            'number' => $request->number != null ? $request->number : $user_details->number,
            'location' => $request->location != null ? $request->location : $user_details->location,
            'cnic' => $request->cnic != null ? $request->cnic : $user_details->cnic,
            'city' => $request->city != "" ? $request->city : $user_details->city,
            'state' => $request->state != null ? $request->state : $user_details->state,
            'company_name' => $request->company_name != "" ? $request->company_name : $user_details->company_name
        ]);
        return response()->json([
            'data' => new UserResource($user)
        ]);
        
    }

    public function changeUserImage(Request $request)
    {
        // dd($request->toArray());
        $user_details = UserDetails::where('user_id', $request->userId)->first();
        
        $image = '';
        if($request->hasfile('profile_image')){
            $image_array = $request->file('profile_image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/project-assets/uploaded/images/');
            $image_array->move($destination_path, $image);
            if ($user_details->profile_image != "user.png") {
                @unlink(public_path('project-assets\uploaded\images/') . $user_details->profile_image);
            }
        }

        UserDetails::where('user_id', $request->userId)->update([
            'profile_image' => $image != "" ? $image : $user_details->profile_image
        ]);

        return response()->json([
            'data' => "Changed"
        ]);

    }

}
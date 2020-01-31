<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Carbon\Carbon;

use App\Image;

class TestController extends Controller
{
    public function TestRoutes()
    {
        $users = User::all();
        return view('project.test-routes.index', compact('users'));
    }

    public function TokenExpireIn()
    {
        $date = Carbon::now()->addHour(2)->toDateTimeString();
        dd($date);
    }

    public function getImageUploadPage()
    {
        $items = Image::all();
        return view("image", compact("items"));
    }
    public function ImageUploadAction(Request $request)
    {
        // dd($request->toArray());
        
        $file_name = "";
        $file_type = "";
        $preview_video = '';

        if($request->hasfile('image')){
            $image_array = $request->file('image');
            // $file_name = (explode('.',$image_array->getClientOriginalName()))[0];
            $file_type = $image_array->getClientOriginalExtension();
            // $file_name = "cou_pre_video_".rand(123456,999999).".".$file_type;
            $file_name = "cou_pre_video_".rand(123456,999999).".jpg";
            $destination_path = public_path('/uploaded/');
            $image_array->move($destination_path,$file_name);
            // dd($file_type);
        }

        Image::create([
            'name' => $file_name,
            'type' => "jpg"
        ]);
            // 'type' => $file_type

        return redirect('/image');
    }
}

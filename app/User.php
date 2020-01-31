<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

use App\Models\Role;
use App\Models\UserDetails;
use App\Models\Quiz;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'password_remember', 'phone_number', 'region', 'is_active', 'created_by', 'api_token', 'api_token_expireIn', 'available_quizs', 'batch', 'course_name', 'student_courses', 'user_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public function user_details()
    {
        return $this->hasOne('App\Models\UserDetails');
    }

    // for checking if user have specific role to allow access
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }
        else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function getRoleId()
    {
        return $this->roles();
    }

    public function setToken()
    {
        $this->api_token = Str::random(60);
        $this->save();
        return $this->token;
    }

    public function setTokenExpireDate()
    {
        $this->api_token_expireIn = Carbon::now()->addHour(2)->toDateTimeString();
        $this->save();
        return $this->token_expireIn;
    }

    public function getProfileImage()
    {
        return asset('project-assets/uploaded/images/'.$this->user_details->profile_image);
    }

    public function quizs()
    {
        return $this->hasMany('App\Models\Quiz');
    }

}

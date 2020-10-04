<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'avatar', 'email', 'password',
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

    /**
     * setPasswordAttribute[override laravel method to hash the pasword before inserting it to database]
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * getAvatarAttribute [override laravel method to return the avatar that belong to specific user]
     * 
     *@return string [url]
     */
    public function getAvatarAttribute($value)
    {
        return $value ? asset('storage/' . $value) : asset('/images/default-avatar.png');
    }

    /**
     * timeline [get the collection of tweets that belongs to the 
     * authinticated user and the users that he follows]
     * 
     * @return array [collections of tweets]
     */
    public function timeline()
    {
        $friends = $this->follows()->pluck('id');
        return Tweet::whereIn('user_id', $friends)
        ->orWhere('user_id', $this->id)
        ->withLikes()
        ->latest()->paginate(8);
    }

    /**
     * tweets [for the one to many relation between User and Tweet Model]
     * 
     * @return object
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    /**
     * getRouteKeyName [override the laravel function 
     * to search User model by name not by id, 
     * cause i want for the user to get the name in the url 
     * instead of id when he visit the profile]
     * 
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}

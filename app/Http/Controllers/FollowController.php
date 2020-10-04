<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowController extends Controller
{
    /**
     * store [attach or detach the user to the following list]
     * 
     * @var object [user]
     * 
     * @return string [url]
     */
    public function store(User $user)
    {
        
        auth()->user()->followToggle($user);

        return back();
    }

}

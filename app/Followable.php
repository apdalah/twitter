<?php

namespace App;

/**
 * Folowable [custom trait to handel user following functionality]
 */
trait Followable
{
    /**
     * follows [relation between the authinticated user and the followings]
     * @var [User => class]
     * @var [follows => the table name]
     * @var [user_id => reference to the authinticated user]
     * @var [following_user_id => reference to the following member]
     * 
     * @return object [ Notice => it will return an object if you use [$user->foolows()]
     *  BUT if you use it like that [$user->folows] without paranthese it will return 
     *  a collections with following list ]
     */
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    /**
     * follow [attach member to my following list]
     * @var object [$user]
     * 
     * @return boolean
     */
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    /**
     * unfollow [detach member from my following list]
     * @var object [$user]
     * 
     * @return boolean
     */
    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function followToggle(User $user)
    {   
        return $this->follows()->toggle($user);

        //hard code
        // if($this->is_following($user))
        // {
        //     return $this->unfollow($user);
        // }
           
        // return $this->follow($user);
        
    }

    /**
     * is_following [check if that user the authinticated 
     * user visited is in the following list or not]
     * 
     * @return boolean
     */
    public function is_following(User $user)
    {   
        return $this->follows()
        ->where('following_user_id', $user->id)
        ->exists(); // remember follows() return an object BUT follows return a collection
        // so in this way we search about matching in follows table

        // notice this code will not work correctly if the authinticated user hase a lot of folloings
        // cause it get a collection of the following list then search inside it if that user is their
        // i'll keep it for learning purpos :)
        // return $this->follows->contains($user);
    }
}
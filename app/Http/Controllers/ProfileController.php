<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class ProfileController extends Controller
{   
    
    // show user profile
    public function show(User $user)
    {
        $tweets = $user->tweets()->withLikes()->paginate(3);
        return view('profile.index', compact('user', 'tweets'));
    }

    // edit user profile
    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([

            'username' => [
                'required', 'string', 'max:255', 'alpha_dash', 
                Rule::unique('users')->ignore($user)
            ],

            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],

            'email' => ['
                required', 'string', 'email', 'max:255', 
                Rule::unique('users')->ignore($user)
            ]
        ]);

        if($request->password)
        {
            $password = $request->validate(['password' => ['string', 'min:8', 'confirmed']]);
            $validated['password'] = $request->password;
        }

        if($request->avatar)
        {
            $avatar = $request->validate(['avatar' => ['image', 'file']]);
            $validated['avatar'] = $request->avatar->store('images/users');
        }

        // dd($validated);
        
        $user->update($validated);

        return redirect()->route('profile', $user);
        
    }
}

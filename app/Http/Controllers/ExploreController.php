<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExploreController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->paginate(10);
        return view('explore', compact('users'));
    }
}

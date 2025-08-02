<?php

namespace App\Http\Controllers;

use App\Models\User;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->post()->latest()->paginate(); 
        // dd($user->post());
        
        return view('profile.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}

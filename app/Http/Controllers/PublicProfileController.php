<?php

namespace App\Http\Controllers;

use App\Models\User;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        // dd($user);
        $posts = $user->post()->latest()->paginate(); //paginated
        return view('profile.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}

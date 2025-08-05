<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function followUnfollow(User $user)
    {

        // if($user->id !== Auth::user() ){
        //     ($user->follower()->toggle(Auth::user()));
    
        // return response()->json([
        //     'followersCount' => $user->follower()->count(),
        // ]);
        // }
        $user->follower()->toggle(Auth::user());
    
        return response()->json([
            'followersCount' => $user->follower()->count(),
        ]);
    }

}

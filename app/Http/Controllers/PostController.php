<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
        $user = auth()->user();

        $query = Post::latest();
        if($user){
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        } 
        // $post = Post::orderBy('created_at', 'desc')->paginate(10);

        // dd(auth()->user()->following()->pluck('users.id'));
        $post = $query->paginate(10);
        
        return view('post.home', [
            'posts' => $post
        ]);
        // return (['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('post.create', ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {

        $validated = $request->validated();

        // $image = $validated['image'];
        // unset($validated['image']);
        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($validated['title']);

        // $imagePath = $image->store('posts', 'public');
        // $validated['image'] = $imagePath;

        $post = Post::create($validated);

        $post->addMediaFromRequest('image')
            ->toMediaCollection();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {   
        return view('post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->simplePaginate(5);

        return view('post.home', [
            'posts' => $posts
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', $user->id)->get(),
            'title' => 'My Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Create New Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }
        $validated['user_id'] = $user->id;
        $validated['author'] = $user->name;
        $validated['excerpt'] = str()->limit(strip_tags($validated['body']), 200);

        Post::create($validated);

        return redirect('/dashboard/posts')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
            'title' => 'Post Details'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'title' => 'Edit Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $user = $request->user();
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts,slug';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['user_id'] = $user->id;
        $validated['author'] = $user->name;
        $validated['excerpt'] = str()->limit(strip_tags($validated['body']), 200);

        Post::where('id', $post->id)->update($validated);

        return redirect('/dashboard/posts')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);

        return redirect()->back()->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

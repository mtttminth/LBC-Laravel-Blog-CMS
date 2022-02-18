<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function index()
    {
        //SHOW POSTS THAT BELONGS TO OWNER
        $posts = auth()->user()->posts()->paginate(10);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {

        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    public function store()
    {
        //authorization policy
        $this->authorize('create', Post::class);
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', $inputs['title'] . ' was created');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        //authorization policy
        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function destroy(Post $post, Request $request)
    {
        //authorization policy
        $this->authorize('delete', $post);
        $post->delete();

        $request->session()->flash('post-deleted-message', $post['title'] . ' was deleted');

        return back();
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //authorization policy
        $this->authorize('update', $post);

        $post->update();

        session()->flash('post-updated-message', $inputs['title'] . ' was updated');

        return redirect()->route('post.index');
    }
}
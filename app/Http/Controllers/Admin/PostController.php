<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Post\{StoreRequest, UpdateRequest};

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $posts = Post::withTrashed()->with('category')->paginate();
        return view('admin.posts.index', compact('posts'))
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Requests\StoreRequest $request Validates form
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        $post = Post::create(
            [
                'title'            => $request->title,
                'slug'             => $request->slug,
                'description'      => $request->description,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'status'           => $request->status,
                'category_id'      => $request->category_id
            ]
        );

        if ($post) {
            return redirect(route('admin.posts.index'));
        }

        return back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post Post instance
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Post $post) : View
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin.posts.create', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRequest $request Validates form
     * @param \App\Post                        $post    Post instance
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Post $post) : RedirectResponse
    {
        $post = Post::update(
            [
                'title'            => $request->title,
                'slug'             => $request->slug,
                'description'      => $request->description,
                'meta_keywords'    => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'status'           => $request->status,
                'category_id'      => $request->category_id
            ]
        );

        if ($post) {
            return redirect(route('admin.posts.index'));
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post Post instance

     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {

        } else {

        }
    }

    /**
     * Recover the specified resource from storage.
     *
     * @param \App\Category $category Category instance
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recover(Category $post) : RedirectResponse
    {
        if ($post->restore()) {

        } else {

        }

        return back();
    }

    /**
     * Permanently delete the specified resource from storage.
     *
     * @param \App\Post $post Post instance
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permanentDelete(Post $post) : RedirectResponse
    {
        if ($post->forceDelete()) {

        } else {

        }

        return back();
    }
}

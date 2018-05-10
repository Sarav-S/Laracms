<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\{StoreRequest, UpdateRequest};

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        $categories = Category::withTrashed()->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request Validates the given form requests
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        $category = Category::create(
            [
                'name'   => $request->name,
                'slug'   => str_slug($request->name),
                'status' => $request->status
            ]
        );

        if ($category) {
            return redirect(route('admin.categories.index'));
        }

        return back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category Category instance
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Category $category) : View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRequest $request  Validates the form requests
     * @param \App\Category                    $category Category instance
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Category $category) : RedirectResponse
    {
        $status = $category->update(
            [
                'name'   => $request->name,
                'slug'   => str_slug($request->name),
                'status' => $request->status
            ]
        );

        if ($status) {
            return redirect(route('admin.categories.index'));
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category Category instance
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category) : RedirectResponse
    {
        if ($category->delete()) {

        } else {

        }

        return back();
    }

    /**
     * Permanently delete the specified resource from storage.
     *
     * @param \App\Category $category Category instance
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function recover(Category $category) : RedirectResponse
    {
        if ($category->restore()) {

        } else {

        }

        return back();
    }

    /**
     * Recover the specified resource from storage.
     *
     * @param \App\Category $category Category instance
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permanentDelete(Category $category) : RedirectResponse
    {
        if ($category->forceDelete()) {

        } else {

        }

        return back();
    }
}

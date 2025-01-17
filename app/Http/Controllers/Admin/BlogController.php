<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();

        // $data = [
        //     'data_blog' => $blogs,
        //     'headers' => 'blog'
        // ];

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get(['id','nama']);
        $statuses = Blog::statuses();

        return view('admin.blogs.create', compact('types','statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('image')->store(
                'blog/images', 'public'
            );
            $slug = Str::slug($request->title, '-');

            Blog::create($request->except('image') + ['image' => $image , 'slug' => $slug]);
        }

        return redirect()->route('admin.blogs.index')->with([
            'message' => 'berhasil di buat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $types = Type::get(['id','nama']);
        $statuses = Blog::statuses();

        return view('admin.blogs.edit', compact('blog','types','statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if($request->validated()){
            $slug = Str::slug($request->title, '-');
            if($request->image) {
                File::delete('storage/' . $blog->image);
                $image = $request->file('image')->store(
                    'blog/images','public'
                );

                $blog->update($request->except('image') + ['image' => $image, 'slug' => $slug]);
            }else {
                $blog->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.blogs.index')->with([
            'message' => 'berhasil di edit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        File::delete('storage/' . $blog->image);
        $blog->delete();

        return redirect()->back()->with([
            'message' => 'berhasil di hapus',
            'alert-type' => 'danger'
        ]);
    }
}

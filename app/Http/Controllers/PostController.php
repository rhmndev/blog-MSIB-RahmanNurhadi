<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published'  => 'nullable|boolean',
            'category_id'   => 'required|exists:categories,id',
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            Post::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath,
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id
            ]);
            return redirect()->route('posts.index')->with('success', 'Category created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function edit(Post $category)
    {
        return view('posts.edit', compact('category'));
    }

    public function update(Request $request, Post $category)
    {
        $request->validate([
            'name'        => 'required|unique:categories|string|max:255',
            'description' => 'nullable|string',
        ]);

        try {
            $category->update($request->all());
            return redirect()->route('posts.index')->with('success', 'Category updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }

    public function destroy(Post $category)
    {
        $category->delete();
        return redirect()->route('posts.index')->with('success', 'Category deleted successfully');
    }
}

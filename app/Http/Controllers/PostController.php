<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view ('post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
        ]);
    
        if ($request->hasFile('photo')) {
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $photoPath = '/storage/' . $path;
    
            if ($path) {
                // If file upload was successful, create the post
                $requestData = $request->all();
                $requestData['photo'] = $photoPath;
                Post::create($requestData);
    
                return redirect('post')->with('flash_message', 'Post Added!');
            } else {
                // Handle file upload failure
                return redirect()->back()->withInput()->withErrors(['photo' => 'Failed to upload photo.']);
            }
        } else {
            // Handle case where no file was uploaded
            return redirect()->back()->withInput()->withErrors(['photo' => 'No photo uploaded.']);
        }
    }    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

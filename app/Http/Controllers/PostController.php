<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add any necessary image validation rules
        ]);
    
        $post = new Post();
    
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('images'), $fileName);
            $post->image = $fileName;
        }
        $post->save();
    
        return redirect('/posts')->with('post', $post);
    }    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
    
        return view('post.edit', compact('post'),['post' => $post]);
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required',
        ]);
    
        $post = Post::find($id);

        if ($request->has('image')) {
            $imagePath = public_path('images/' . $post->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            } 

            // Upload the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move(public_path('images'), $fileName);

            // Update the image field in the database
            $post->image = $fileName;
        }
            // Update other fields
            $post->title = $request->title;
            $post->content = $request->content;
        
            // Save the updated post
            $post->save();                

            return redirect('/posts')->with('successAlert', 'Post updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect('/posts')->with('successAlert', 'You have successfully deleted.');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $posts = Post::where('title', 'like', "%$search%")->get();
    
        if ($posts->isEmpty()) {
            return view('post.search', ['result' => $posts, 'message' => 'No posts found for the given search.']);
        }
    
        return view('post.search', ['result' => $posts]);
    }
}    
 
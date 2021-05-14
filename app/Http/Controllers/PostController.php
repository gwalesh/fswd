<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $user = DB::table('users')->get();
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();
        $data['users'] = User::all();
        $data['posts'] = Post::orderBy('created_at', 'desc')->get();
        return view('site.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|nullable',
            'post_by_id' =>  'string|nullable',
            'excerpt' => 'string|nullable',
            'body'  => 'string|nullable|max:100000',
            'featured_image' => 'image|nullable|mimes:mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         // Handle File Upload
         if($request->hasFile('featured_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('featured_image')->storeAs('public/featured_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post;
            $post->title = $request->input('title');
            $post->post_by_id = $request->input('post_by_id');
            $post->excerpt = $request->input('excerpt');
            $post->body = $request->input('body');
            $post->featured_image = $fileNameToStore;

        $post->save();
        return redirect('/post')->with('success','Blog Saved Succesfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('site.posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('site.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string|nullable',
            'post_by_id' => 'string|nullable',
            'excerpt' => 'string|nullable',
            'body' => 'string|nullable',
        ]);
		$post = Post::find($id);
         // Handle File Upload
        if($request->hasFile('featured_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('featured_image')->storeAs('public/featured_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/featured_images/'.$post->featured_image);
		
        }

        // Update Post
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->excerpt = $request->input('excerpt');
        $post->post_by_id = $request->input('post_by_id');
        if($request->hasFile('featured_image')){
            $post->featured_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/post')->with('success', 'Post Updated Sucessfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!isset($post)){
        return redirect('/post')->with('error','Post Not Found !');
        }

        if($post->featured_image !== 'noimage.jpg'){
            Storage::delete('public/featured_images/' . $post->featured_image);
        }

        $post->delete();
        return redirect('/post')->with('success','Post Deleted Sucessfully !!');
    }

    public function home()
    {
        return view('site.index');
    }
}

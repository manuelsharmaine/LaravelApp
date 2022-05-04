<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SharePostMail;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        // $posts  = Post::where('user_id',Auth::id())->get();
            // dd($posts);
        $chunk = $posts->chunk(2);
        $count = $posts->count();
        $reverse = $posts->reverse();
        $pluck = $posts->pluck('title');
        $except = $posts->except([12]);

        $filter = $posts->filter(function($item)
        {
            
            return $item->title != 'test';
        });

        $grouped = $posts->groupBy('user_id');

        // dd($grouped->all());

        // $posts = User::find(Auth::id())->posts;

        // dd($posts);
        // $posts = Post::withTrashed()->get();
        // $posts = Post::onlyTrashed()->get();
        // dd($posts);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        // dd();
    
        $photo = $request->file('photo');
        if($request->hasFile('photo')){
            $filenameWithExtension = $photo->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extesion = $photo->getClientOriginalExtension();
            $image = $filename.'_'.time().'.'.$extesion;
            $path = $photo->storeAs('public/img', $image);
        }else{
            $image = null;
        }

        $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        $post->fill($request->all());
        $post->user_id = Auth::id();
        $post->photo = $image;
        $post->save();




        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        // dd($post);
        return view('admin.post.show')->with('post',$post);
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
        return view('admin.post.edit',compact('post'));
        //
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
        //
        // dd($request->all());
        $post = Post::find($id);
        // $post->title = $request->title;
        // $post->description = $request->description;
        $post->fill($request->all());
        $post->save();

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);
        $post->delete();

        return redirect('/admin/posts');
    }

    public function sharePost(Request $request, $id){

        $request->validate([
            'email'  => 'required'   
        ]);
        
        $post = Post::find($id);

        Mail::to($request->email)->send(new SharePostMail($post));
        return redirect()->back();

    }
}

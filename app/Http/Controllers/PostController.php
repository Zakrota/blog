<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\taq;
use Session;

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
        $posts=Post::orderBy('id','desc')->paginate(4);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Taq::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

             $this->validate($request,[
            'title' =>'required|max:255' , 
            'slug' =>'required|alpha_dash|min:5|max:255',
            'category_id'=>'required|integer' ,
            'body' =>'required'

            ]);
        
        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = $request->body;

        $post->save();

        $post->taq()->sync($request->tags , false);
        Session::flash('success','The Blog post was successfuly saved !');
        //redirect
       return redirect()->route('posts.show', $post->id);



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
        $post=Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories=Category::all();
        $cats=[];
        foreach($categories as $category){
        $cats[$category->id]=$category->name;
        }

        $tags=Taq::all();
        $tags2=[];
        foreach ($tags as $tag) {
           $tags2[$tag->id]=$tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
        
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
         $post=Post::find($id);
        //Validate in the Data 
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,[
            'title' =>'required|max:255' ,
            'category_id'=>'required|integer' , 
            'body' =>'required'

            ]);
        } else {
        $this->validate($request,[
            'title' =>'required|max:255' , 
            'slug' =>'required|alpha_dash|min:5|max:255|unique:posts,slug' , 
            'category_id'=>'required|integer' ,
            'body' =>'required'

            ]);
               }
       $post=Post::find($id);

       $post->title=$request->input('title');
       $post->slug=$request->input('slug');
       $post->category_id=$request->input('category_id');
       $post->body=$request->input('body');

       $post->save();
        
        if (isset($request->tags)) {
            $post->taq()->sync($request->tags);
        } else {
            $post->taq()->sync(array());
        }
        
       Session::flash('success','This Post was Changed');
       return redirect()->route('posts.show',$post->id);

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
        $post=Post::find($id);
        $post->taq()->detach();
        $post->delete();

        Session::flash('success','The Post was successfuly Deleted .');
        return redirect()->route('posts.index');
    }
}

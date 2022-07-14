<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact ('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->rulesValidate(), $this->messagesValidate());

        $data = $request->all();

        $new_post = new Post();

        $data['slug'] = Post::generatoreSlug($data['name']);

        $new_post->fill($data);

        $new_post->save();

        if(array_key_exists('tags', $data)){
            $new_post->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.posts.index', $new_post);
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
        return view('admin.posts.show', compact('post'));
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $request->validate($this->rulesValidate(), $this->messagesValidate());


        $data = $request->all();

        if($data['name'] != $post->name){
            $data['slug'] = Post::generatoreSlug($data['name']);
        }

        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }else{
            $post->tags()->detach();
        }

        return redirect()->route('admin.posts.index', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    private function rulesValidate(){
        return[
            'name' => 'required|max:50|min:3',
            'category_id' => 'required|numeric',
            'location' => 'required|max:50|min:2',
            'email' => 'required|max:50|min:5'
        ];
    }

    private function messagesValidate(){
        return[
            'name.required' => 'Questo campo è obbligatorio',
            'name.max' => 'Questo campo non può superare i :max caratteri',
            'name.min' => 'Questo campo non può essere inferiore ai :min caratteri',
            'category_id.numeric' => 'Questo campo è obbligatorio',
            'location.required' => 'Questo campo è obbligatorio',
            'location.max' => 'Questo campo non può superare i :max caratteri',
            'location.min' => 'Questo campo non può essere inferiore ai :min caratteri',
            'email.required' => 'Questo campo è obbligatorio',
            'email.max' => 'Questo campo non può superare i :max caratteri',
            'email.min' => 'Questo campo non può essere inferiore ai :min caratteri',
        ];
    }
}

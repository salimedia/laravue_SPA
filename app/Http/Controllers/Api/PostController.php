<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $catID = $request->category_id ?? 'created_at';
        $sortBy = $request->sort_field ?? 'desc';
        if (!in_array($sortBy, ['title','post_text','created_at'])) {
            $sortBy= 'created_at';
        }

        $sortDirection = $request->sort_direction;
        if (!in_array($sortDirection, ['asc','desc'])) {
            $sortBy= 'desc';
        }

        $posts = Post::when($catID > 0, function($query) use ($catID){
            return $query->where('category_id', $catID);
        })
        ->orderBy($sortBy, $sortDirection)
        ->paginate(3);

        return PostResource::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->validated());

        return new PostResource($post);
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
    }
}

<?php

namespace App\Http\Controllers\FrontEnd\Fav;

use App\Http\Controllers\Controller;
use App\Models\ClientPost;
use App\Models\Post;
use Illuminate\Http\Request;

class FavoritePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function favoriteAdd(Request $request)
    {
//        $product = Post::find($id);
////        $user = auth()->guard('client');
//        $user = auth()->user();
////        dd($user,$product);
//        ClientPost::attach($product , $user);
//        session()->flash('success', 'Product is Added to Favorite Successfully !');

        if (! auth()->user()->favorite_posts($request->post_id)){
//            auth()->guard('client')->favorite_posts()->attach($request->post_id);
            return redirect()->route('index');
        }

            return redirect()->route('index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

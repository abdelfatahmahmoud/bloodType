<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ClientPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
    public function posts()
    {
        $posts  = Post::all();
        $response =[
            'status' => 1,
            'message' => 'success',
            'data' => $posts,
        ];

        return response()->json($response);
    }
    public function index()
    {
        $posts = Auth::user()->favorite_posts;
        dd($posts);
//        return view('author.favorite',compact('posts'));
    }

  public function my_favourite(Request $request)
  {
    $posts = $request->user()->client_post()->latest()->paginate(20);
    return response()->json(['lodded',$posts]);


  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
//  public function postFavouriteClient(Request $request)
//  {
//$posts = Post::whereHasFa
//      if (! auth()->guard('client')->whereHas())
//
//      $validator = validator()->make($request->all(), [
//
//          'post_id'=>'required'
//      ]);
//
//      if ($validator->fails()) {
//          return response()->json($validator->errors);
//      }
//      $toggle = $request->user()->favorite_posts()->toggle($request->post_id);
//      dd($toggle);
//      return response()->json(['success',$toggle]);
//
//  }




  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function allPosts(Request $request)
  {

      $posts = Post::where(function ($query) use($request){
          if ($request->has('find')){
              $query->where(function ($query) use($request){
                  $query->where('title', 'like' , '%'. $request->find. '%');
                  $query->orWhere('content', 'like' , '%'. $request->find. '%');

              });
          }

          if ($request->has('category_id')){
              $query->where('category_id',$request->category_id);
          }
      });
      return response()->json(['success',$posts]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>

<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    use AttachFilesTrait;

    function __construct()
    {
        $this->middleware('permission:المنشورات', ['only' => ['index']]);
        $this->middleware('permission:اضافة منشور', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل منشور', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف منشور', ['only' => ['destroy']]);

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        $category = Category::all();
        return view('pages.post.index',compact('posts','category'));
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
    public function store(Request $request)
    {
//        try {

            $this->validate($request, [

                'image' => 'mimes:pdf,jpeg,png,jpg',

            ], [
                'image.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);

            $books = new Post();
            $books->title = $request->title;

            if ($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move('uploads/posts/',$filename);
            $books->image =  $filename;
        }
            $books->content = $request->contentt;
            $books->category_id = $request->category_id;

//            dd($books);
            $books->save();
        //    $imageName = $request->image->getClientOriginalName();
      //      $request->image->move(public_path('Attachment/'), $imageName);
//            $this->uploadFile($request,'image');

            toastr()->success(trans('messages.success'));
            return redirect()->route('posts.index');
//        } catch (\Exception $e) {
//            return redirect()->back()->with(['error' => $e->getMessage()]);
//        }
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
    public function update(Request $request)
    {
        try {

            $book = Post::findorFail($request->id);
            $book->title = $request->title;
            if ($request->hasFile('image')){
                $nn = 'uploads/posts/'.$book->image;
                if (File::exists($nn)){
                    File::delete($nn);
                }
                $file = $request->file('image');
                $extention = $file->getClientOriginalName();
                $filename = time().'.'.$extention;
                $file->move('uploads/posts/',$filename);
                $book->image =  $filename;
            }

            $book->content = $request->contentt;
            $book->category_id = $request->category_id;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if ($request->hasFile('image')) {
            $nn = 'uploads/posts/' . $request->image;
            if (File::exists($nn)) {
                File::delete($nn);
            }
        }
        $book = Post::findorFail($request->id)->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('posts.index');


//        $this->deleteFile($request->file_name);
//        library::destroy($request->id);
//        toastr()->error(trans('messages.Delete'));
//        return redirect()->route('library.index');
    }
}

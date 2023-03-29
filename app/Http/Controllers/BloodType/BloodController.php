<?php

namespace App\Http\Controllers\BloodType;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\BloodType;
use App\Models\Category;
use Illuminate\Http\Request;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BloodType::all();
        return view('pages.bloodtype.index', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        try {
            $cateory = new BloodType();
            $cateory->name = $request->name;
            // dd($governorate);
            $cateory->save();
            toastr()->success('تم الأضافة بنجاح');
            return redirect()->route('bloodtype.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
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
    public function update(CategoryRequest $request)
    {
        try {

            $category = BloodType::findOrFail($request->id);

            $category->update([

                $category->name = $request->name,
            ]);
            toastr()->success('messages.Update');
            return redirect()->route('bloodtype.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $category = BloodType::findOrFail($request->id)->delete();
        toastr()->success('messages.Delete');
        return redirect()->route('bloodtype.index');
    }
}

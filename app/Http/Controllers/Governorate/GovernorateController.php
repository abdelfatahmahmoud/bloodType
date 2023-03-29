<?php

namespace App\Http\Controllers\Governorate;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
use App\Models\Goverrnoate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المحافظات', ['only' => ['index']]);
        $this->middleware('permission:اضافة محافظة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل محافظة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف محافظة', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Goverorates = Goverrnoate::paginate(20);
//        dd($coverorate);
        return view('pages.governorate.index',compact('Goverorates'));
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
    public function store(StoreSections $request)
    {
        try {
            $governorate = new Goverrnoate();
            $governorate->name = $request->name;
           // dd($governorate);
            $governorate->save();
            toastr()->success('تم الأضافة بنجاح');
            return redirect()->route('governorate.index');
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
    public function update(StoreSections $request)
    {
        try {

            $governorate = Goverrnoate::findOrFail($request->id);

            $governorate->update([

                $governorate->name = $request->name,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('governorate.index');
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
        $governorate = Goverrnoate::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('governorate.index');

    }


}

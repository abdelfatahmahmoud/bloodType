<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Goverrnoate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:المدن', ['only' => ['index']]);
        $this->middleware('permission:اضافة مدينة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل مدينة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف مدينة', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = City::paginate(10);
        $governorate = Goverrnoate::all();
        return view('pages.city.index',compact('city','governorate'));
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
    public function store(CityRequest $request)
    {
        try {
            $validated = $request->validated();
            $city = new City();
            $city->name = $request->name;
            $city->governorate_id = $request->governorate_id;

            $city->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('cities.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
    public function update(CityRequest $request)
    {
        try {

            $city = City::findOrFail($request->id);

            $city->update([

                $city->name = $request->name,
            $city->governorate_id = $request->governorate_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('cities.index');
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
        $city = City::findOrFail($request->id)->delete();
        toastr()->error('Delete');
        return redirect()->route('cities.index');



    }
}

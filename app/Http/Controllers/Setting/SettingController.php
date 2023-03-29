<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:الاعدادات', ['only' => ['index']]);
        $this->middleware('permission:اضافة اعدادات', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل اعدادات', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف اعدادات', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all();
        return view('pages.setting.index', compact('setting'));
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
        try {
            $setting = new Setting();
            $setting->notifecations_settings_text = $request->notifecations_settings_text;
            $setting->about_app = $request->about_app;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->fb_link = $request->fb_link;
            $setting->tw_link = $request->tw_link;
            $setting->insta = $request->insta;

            $setting->save();
            toastr()->success('تم الأضافة بنجاح');
            return redirect()->route('setting.index');
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
    public function update(Request $request)
    {
        try {
            $setting = Setting::findOrFail($request->id);
            $setting->notifecations_settings_text = $request->notifecations_settings_text;
            $setting->about_app = $request->about_app;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->fb_link = $request->fb_link;
            $setting->tw_link = $request->tw_link;
            $setting->insta = $request->insta;

            $setting->save();
            toastr()->success('تم الأضافة بنجاح');
            return redirect()->route('setting.index');
        }
        catch (\Exception $e) {
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
        $setting = Setting::findOrFail($request->id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('setting.index');
    }
}

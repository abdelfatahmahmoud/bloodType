<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:قائمة الرسائل', ['only' => ['index']]);
        $this->middleware('permission:اضافة رسالة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل رسالة', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف رسالة', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view('pages.contact.index', compact('contact'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        try {
//            $contact = new Contact();
//            $contact->name = $request->name;
//            $contact->email = $request->email;
//            $contact->subject = $request->subject;
//            $contact->message = $request->message;
//            $contact->phone = $request->phone;
//            // dd($governorate);
//            $contact->save();
//            toastr()->success('تم الأضافة بنجاح');
//            return redirect()->route('contact.index');
//        } catch (\Exception $e) {
//            return redirect()->back()->with(['error' => $e->getMessage()]);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $contact = Contact::findOrFail($request->id);

            $contact->update([

                $contact->name = $request->name,
            $contact->email = $request->email,
            $contact->subject = $request->subject,
            $contact->message = $request->message,
            $contact->phone = $request->phone,
            ]);
            toastr()->success('messages.Update');
            return redirect()->route('contact.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contact = Contact::findOrFail($request->id)->delete();
        toastr()->error('تم الحذف بنجاح');
        return redirect()->route('contact.index');

    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:العملاء', ['only' => ['index']]);
        $this->middleware('permission:اضافة العميل', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل العميل', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف العميل', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
            if ($search != ""){
                $client= Client::where('name', 'LIKE', "%$search%")->orWhere
                ('phone', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
//                dd($client);
            }else{
                $client = Client::all();
            }
        $city = City::all();
        $blood_type = BloodType::all();
        $data = compact('client','search','city','blood_type');
//        dd($client, $city, $blood_type);
        return view('pages.client.index')->with($data);
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
        $invoices = Client::findOrFail($request->id);
        $invoices->update([

            'is_active' => $request->is_active,
            ]);
        toastr()->success(trans('messages.Update'));
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::findOrFail($request->id)->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('clients.index');
    }


//    public function client_filter(){
//        return view('pages.client.reports');
//    }
//
//
//    public function get_client_filter(Request $request)
//    {
//
//
//
//
//        $client = Client::select('*')->where('name', '=', $request->name)->orWhere('phone', '=', $request->name)
//            ->orWhere('email', '=', $request->name)->get();
////           dd($client);
//            $city = City::all();
//            $blood = BloodType::all();
//
//            return view('pages.client.reports', compact('city','blood'))->withDetails($client);
//
//
//        }

    }

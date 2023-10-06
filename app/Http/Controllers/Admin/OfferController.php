<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferRequest;
use App\Models\Admin\Offer;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Offer::get()->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offers.offercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {

        //add validation
        // $rules      = $this -> setFormRules();
        // $messages   = $this -> getErrorMessages();

        // $validation = Validator::make($request->all()  ,$rules ,$messages);

        // if ($validation -> fails()) {
        //     //return $validation -> errors();
        //     return redirect()->back()->withErrors($validation)->withInputs($request->all());
        // }


        //save photo in db
        $file_extension = $request -> photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = 'images/offers';
        $request -> photo -> move($path ,$file_name);

        //insert form data into db
        Offer::create([

            'name'      => $request->name,
            'price'     => $request->price,
            'details'   => $request->details,
            'photo'     => $file_name,

        ])->save();

            return redirect()->back()->with(['success' => 'Data Stored Successfully!']);

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

    // //validator rules
    // protected function setFormRules()
    // {
    //     return [
    //         'name'      => 'required|max:100|unique:offers,name',
    //         'price'     => 'required|numeric',
    //         'details'   => 'required'
    //     ];
    // }

    //validator messages
    // protected function getErrorMessages()
    // {
    //     return [
    //         'name.require'      => __('message.offerNameReq'),
    //         'name.length'       => __('message.offerNameLen'),
    //         'name.unique'       => __('message.offerNameUniq'),
    //         'price.required'    => __('message.offerPriceReq'),
    //         'price.numeric'     => __('message.offerPriceNum'),
    //         'details.required'  => __('message.offerDetailsReq'),
    //     ];
    // }



}

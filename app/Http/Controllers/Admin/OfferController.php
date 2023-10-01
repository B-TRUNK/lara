<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {

        //add validation
        $rules      = $this -> setFormRules();
        $messages   = $this -> getErrorMessages();

        $validation = Validator::make($request->all()  ,$rules ,$messages);

        if ($validation -> fails()) {
            //return $validation -> errors();
            return redirect()->back()->withErrors($validation)->withInputs($request->all());
        }

        //insert form data into db
        Offer::create([

            'name'      => $request->name,
            'price'     => $request->price,
            'details'   => $request->details,

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

    //validator rules
    protected function setFormRules()
    {
        return [
            'name'      => 'required|max:100|unique:offers,name',
            'price'     => 'required|numeric',
            'details'   => 'required'
        ];
    }

    //validator messages
    protected function getErrorMessages()
    {
        return [
            'name.require'      => 'name is required',
            'name.length'       => 'max length should be <= 100',
            'name.unique'       => 'a new offer name should be entered',
            'price.required'    => 'price should be a value!',
            'price.numeric'     => 'price should be a Numeric Value!',
            'details.required'  => 'Please give a short description about that offer!',
        ];
    }



}

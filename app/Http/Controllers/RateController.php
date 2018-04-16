<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RateInfo;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rates = RateInfo::all();
        //return $rates;
        return view('Rate.rate',compact('rates'));
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

    }



    public function add(Request $request){

        $rate = new RateInfo;
        
        $rate->name = $request->Rate['rname'];
        $rate->rate_code = $request->Rate['rcode'];
        $rate->init_duration = $request->Rate['rinit'];
        $rate->dayhrcharge = $request->Rate['rper'];
        $rate->overnight = $request->Rate['rover'];
        $rate->flatrate = $request->Rate['rflat'];
        $rate->gracemin = $request->Rate['rgrace'];
        $rate->save();
        // $rates = RateInfo::all();
        // $arr = array(
        //     'rid' => $rate->id,
        //     'rname' => $rate->name,
        //     'rcode' => $rate->rate_code,
        //     'rflat' => $rate->flatrate,
        //     'rinit' => $rate->init_duration,
        //     'rper' => $rate->dayhrcharge,
        //     'rover' => $rate->overnight,
        //     'rgrace' => $rate->gracemin,
        //     'obj' => $rates
        // );

        if($request->ajax()){
            return 0;
        }
    }

    public function toEdit(Request $request){

        $rate = RateInfo::find($request->Rate['rid']);
        $rate->name = $request->Rate['rname'];
        $rate->rate_code = $request->Rate['rcode'];
        $rate->init_duration = $request->Rate['rinit'];
        $rate->dayhrcharge = $request->Rate['rper'];
        $rate->overnight = $request->Rate['rover'];
        $rate->flatrate = $request->Rate['rflat'];
        $rate->gracemin = $request->Rate['rgrace'];
        $rate->save();


        if($request->ajax()){
            return 0;
        }
    }

    public function delete(Request $request){
        $rate = RateInfo::find($request['id']);
        $rate->delete();
        if($request->ajax()){
            return 0;
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
}

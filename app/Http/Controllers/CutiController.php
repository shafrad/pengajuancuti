<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Cuti;
use App\Status;
use View;
use Session;
use Redirect;
use DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cutis = Cuti::all();

        return View::make('cutis.index')
            ->with('cutis', $cutis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('cutis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'tgl_awal_cuti'       => 'required',
            'durasi_cuti'    => 'required',
            'keperluan_cuti'    => 'required',
            'alamat_cuti'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cutis/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            
            $hotel = new Cuti;
            $hotel->name       = Input::get('name');
            $hotel->tgl_awal_cuti       = Input::get('tgl_awal_cuti');
            $hotel->durasi_cuti    = Input::get('durasi_cuti');
            $hotel->keperluan_cuti    = Input::get('keperluan_cuti');
            $hotel->alamat_cuti      = Input::get('alamat_cuti');
            $hotel->save();

            Session::flash('message', 'Successfully created Cuti!');
            return redirect()->route('cutis.index');
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
        $cuti = Cuti::find($id);

        return View::make('cutis.show')
            ->with('hotel', $cuti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Cuti::find($id);

        return View::make('cutis.edit')
            ->with('cuti', $hotel);
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
        $rules = array(
            'name'       => 'required',
            'city'       => 'required',
            'address'    => 'required',
            'country'    => 'required',
            'phone'      => 'required',
            'email'      => 'required|email',
            'website'    => 'required',
            'latitude'   => 'required',
            'longitude'  => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('hotels/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            
            $hotel = Hotel::find($id);
            $hotel->name       = Input::get('name');
            $hotel->city       = Input::get('city');
            $hotel->address    = Input::get('address');
            $hotel->country    = Input::get('country');
            $hotel->phone      = Input::get('phone');
            $hotel->email      = Input::get('email');
            $hotel->website    = Input::get('website');
            $hotel->latitude   = Input::get('latitude');
            $hotel->longitude  = Input::get('longitude');
            $hotel->save();

            Session::flash('message', 'Successfully updated hotel!');
            return Redirect::to('hotels');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Cuti::findOrFail($id);
        $hotel->delete();

        Session::flash('message', 'Successfully deleted!');
        return redirect()->route('cutis.index');
    }

    public function index2()
    {
        $cutis = Cuti::all();
        $status = DB::table('cutis')->leftjoin('statuses_cuti','statuses_cuti.cuti_id','cutis.id')
                ->select('cutis.id','cutis.name','cutis.tgl_awal_cuti','cutis.durasi_cuti','cutis.keperluan_cuti','cutis.alamat_cuti','statuses_cuti.status','statuses_cuti.alasan')->get();
    //    return $status;
        return View::make('cutis.index-setuju', compact(['status']));
    }

    public function edit2($id)
    {
        $hotel = Cuti::find($id);

        return View::make('cutis.edit-setuju')
            ->with('cuti', $hotel);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Hotel;
use View;
use Session;
use Redirect;

class HotelController extends Controller
{
    
    //
    public function indexApi()
    {
        return Hotel::paginate(10);
    }

    public function index()
    {
        $hotels = Hotel::all();

        return View::make('hotels.index')
            ->with('hotels', $hotels);
    }

    public function showApi($id)
    {
        return Hotel::find($id);
    }
 
    public function show($id)
    {
        $hotel = Hotel::find($id);

        return View::make('hotels.show')
            ->with('hotel', $hotel);
    }

    public function storeApi(Request $request)
    {
        $hotel = Hotel::create($request->all());

        return response()->json($hotel, 201);
    }

    public function create()
    {
        return View::make('hotels.create');
    }

    public function store()
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

        // process the login
        if ($validator->fails()) {
            return Redirect::to('hotels/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            
            $hotel = new Hotel;
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

            Session::flash('message', 'Successfully created hotel!');
            return Redirect::to('hotels');
        }
    }

    public function updateApi(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());

        return response()->json([
            'data' => $hotel,
            'message' => 'Data has been successfully updated!', 
            200
            ]);
    }

    public function edit($id)
    {

        $hotel = Hotel::find($id);

        return View::make('hotels.edit')
            ->with('hotel', $hotel);
    }

    public function update($id)
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

    public function destroy($id)
    {
        
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('hotels');
    }

    public function destroyApi(Request $request, $id)
    {
        $hotel1 = Hotel::findOrFail($id);
        $hotel1->delete();

        return response()->json([
            'message' => 'Data has been successfully deleted', 
            204
            ]);
        // return 'Data has been successfully deleted';
    }
}

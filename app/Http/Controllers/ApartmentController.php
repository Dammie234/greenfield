<?php

namespace App\Http\Controllers;
use DB;
use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $apartments = DB::table('properties')
                        ->leftJoin('apartments', 'apartments.property_id', '=', 'properties.id')
                        ->where('apartments.user_id', $user_id)
                        ->select('properties.house_number', 'properties.street_name', 'apartments.*')
                        ->get();
        return response()->json($apartments);
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
        $this->validate($request, [
            'property' => 'required', 
            'building_type' => 'required|string'
        ]);
        date_default_timezone_set('Africa/Lagos');
        $data = [
            'user_id' => $request->user_id, 
            'property_id' => $request->property, 
            'building_type' => $request->building_type, 
            'number_of_3_bedroom' => $request->number_of_3_bedroom, 
            'number_of_2_bedroom' => $request->number_of_2_bedroom, 
            'number_of_room_and_palour' => $request->number_of_room_and_palour, 
            'number_of_self_contain' => $request->number_of_self_contain, 
            'number_of_shop' => $request->number_of_shop, 
            'number_of_office_space' => $request->number_of_office_space, 
            'description' => $request->description, 
            'transformer' => $request->transformer
        ];
        Apartment::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $apartment = Apartment::where('id', $apartment->id)->first();
        return response()->json($apartment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $this->validate($request, [
            'property' => 'required', 
            'building_type' => 'required|string'
        ]);
        date_default_timezone_set('Africa/Lagos');
        $data = [ 
            'property_id' => $request->property, 
            'building_type' => $request->building_type, 
            'number_of_3_bedroom' => $request->number_of_3_bedroom, 
            'number_of_2_bedroom' => $request->number_of_2_bedroom, 
            'number_of_room_and_palour' => $request->number_of_room_and_palour, 
            'number_of_self_contain' => $request->number_of_self_contain, 
            'number_of_shop' => $request->number_of_shop, 
            'number_of_office_space' => $request->number_of_office_space, 
            'description' => $request->description, 
            'transformer' => $request->transformer
        ];
        Apartment::where('id', $apartment->id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        Apartment::where('id', $apartment->id)->delete();
    }
}

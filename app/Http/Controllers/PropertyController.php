<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token)
    {
        $user = User::where('token', $token)->first();
        $properties = Property::where('user_id', $user->id)->get();
        return response()->json($properties);
    }
    public function properties($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return response()->json($properties);
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
            'house_number' => 'required|integer',
            'street_name' => 'required|string',
            'property_class' => 'required',
            'property_category' => 'required',
            'property_type' => 'required'
        ]);
        $user = User::where('token', $request->token)->first();
        $data = [
            'user_id' => $user->id,
            'house_number' => $request->house_number,
            'street_name' => $request->street_name,
            'property_class' => $request->property_class,
            'property_category' => $request->property_category,
            'property_type' => $request->property_type
        ];
        Property::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::where('id', $id)->first();
        return response()->json($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'house_number' => 'required|integer',
            'street_name' => 'required|string',
            'property_class' => 'required',
            'property_category' => 'required',
            'property_type' => 'required'
        ]);
        $data = [
            'house_number' => $request->house_number,
            'street_name' => $request->street_name,
            'property_class' => $request->property_class,
            'property_category' => $request->property_category,
            'property_type' => $request->property_type
        ];
        Property::where('id', $id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::where('id', $id)->delete();
    }
}

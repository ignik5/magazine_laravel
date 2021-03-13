<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Property;
use App\Models\PropertyOption;
use App\Http\Requests\PropertyOptionRequest;
use Illuminate\Http\Request;

class PropertyOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Property $property
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {
       
        $propertyoptions = PropertyOption::where('property_id',$property->id)->paginate(10);
        return view('auth.property_options.index',compact('property', 'propertyoptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Property $property
     * @return \Illuminate\Http\Response
     */
    public function create(Property $property)
    {
        return view('auth.property_options.form',compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Property $property
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyOptionRequest $request, Property $property)
    {
        $params=$request->all();
        $params['property_id']=$request->property->id;
   
        PropertyOption::create($params);
        
        return redirect()->route('property-options.index', $property);
    }

    /**
     * Display the specified resource.
     *
     *  @return Property $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property, PropertyOption $propertyOption)
    {
        
        return view('auth.property_options.show',compact('property','propertyOption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Property $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, PropertyOption $propertyOption)
    {
        return view('auth.property_options.form',compact('propertyOption','property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Property $property
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyOptionRequest $request, Property $property, PropertyOption $propertyOption)
    {
        $params=$request->all();
        $propertyOption->update($params);
        
        return redirect()->route('property-options.index',$property);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Property $property
     * @param  \App\Models\PropertyOption  $propertyOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property, PropertyOption $propertyOption)
    {
        $propertyOption->delete();
        return redirect()->route('property-options.index',$property);
    }
}

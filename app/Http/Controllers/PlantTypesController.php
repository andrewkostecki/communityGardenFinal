<?php

namespace App\Http\Controllers;

use App\PlantType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlantTypesController extends Controller
{
    
    public function index() {
        $planttypes = PlantType::where('systemID', app('system')->id)->get();
        return view('planttypes.index', compact('planttypes'));
    }

    public function create() {

        return view('planttypes.create');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        $newplanttype = planttype::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('planttypes');
    }


/**
     * Display a page to edit a new planttype
     *
     */
    public function edit($id) 
    {
        $planttype = planttype::find($id);
        return view('planttypes.edit')->with('planttype', $planttype);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $planttype = planttype::find($request['id']);
        
            $planttype->name = $request['name'];
            $planttype->comments = $request['comments'];
            
            $planttype->updated_at = Carbon::now()->toDateTimeString();
            $planttype->save();
            return redirect('planttypes');
    }

    /**
     * Display a page to delete a new planttype
     *
     */
    public function destroy($id) 
    {
        planttype::destroy($id);

        $planttypes = planttype::all();
        return view('planttypes.index', compact('planttypes'));
    }
}

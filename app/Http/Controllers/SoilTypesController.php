<?php

namespace App\Http\Controllers;

use App\SoilType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SoilTypesController extends Controller
{
    public function index() {

        $soiltypes = SoilType::where('systemID', app('system')->id)->get();
        return view('soiltypes.index', compact('soiltypes'));
    }

    public function create() {

        return view('soiltypes.create');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        $newSoilType = SoilType::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('soiltypes');
    }


/**
     * Display a page to edit a new SoilType
     *
     */
    public function edit($id) 
    {
        $soiltype = SoilType::find($id);
        return view('soiltypes.edit')->with('SoilType', $soiltype);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $soiltype = SoilType::find($request['id']);
        
            $soiltype->name = $request['name'];
            $soiltype->comments = $request['comments'];
            
            $soiltype->updated_at = Carbon::now()->toDateTimeString();
            $soiltype->save();
            return redirect('soiltypes');
    }

    /**
     * Display a page to delete a new SoilType
     *
     */
    public function destroy($id) 
    {
        SoilType::destroy($id);

        $soiltypes = SoilType::all();
        return view('soiltypes.index', compact('soiltypes'));
    }
}

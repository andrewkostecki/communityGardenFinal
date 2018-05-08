<?php

namespace App\Http\Controllers;
use App\Room;
use App\Note;
use App\Plant;
use App\Planter;
use App\PlantType;
use App\SoilType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    public function index() {
        $plants = Plant::where('systemID', app('system')->id)->get();
        
        return view('plants.index', compact('plants', 'lastNote'));
    }

    public function create() {
        $rooms = Room::where('systemID', app('system')->id)->get(['id', 'name']);
        $planters = Planter::where('systemID', app('system')->id)->get(['id', 'name']);
        $soiltypes = SoilType::where('systemID', app('system')->id)->get(['id', 'name']);
        $planttypes = PlantType::where('systemID', app('system')->id)->get(['id', 'name']);

        return view('plants.create', compact('plants', 'rooms', 'planters', 'soiltypes', 'planttypes'));
    }

    public function store(Request $request) 
    {
        //dd($request->all());
        $newPlant = Plant::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'imageFileName' => app('system')->imageFileName, // from appServiceprovider
            'planttypeID' => $request['planttype'],
            'roomID' => $request['room'],
            'planterID' => $request['planter'],
            'soiltypeID' => $request['soiltype'],
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('plants');
    }


/**
     * Display a page to edit a new Plant
     *
     */
    public function edit($id) 
    {
        $plant = Plant::find($id);
        $rooms = Room::where('systemID', app('system')->id)->get(['id', 'name']);
        $planters = Planter::where('systemID', app('system')->id)->get(['id', 'name']);
        $soiltypes = SoilType::where('systemID', app('system')->id)->get(['id', 'name']);
        $planttypes = PlantType::where('systemID', app('system')->id)->get(['id', 'name']);
        
        return view('plants.edit', compact('plant', 'rooms', 'planters', 'soiltypes', 'planttypes'));

        // $plant = Plant::find($id);
        // return view('plants.edit')->with('plant', $plant);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $Plant = Plant::find($request['id']);
        
            $Plant->name = $request['name'];
            $Plant->comments = $request['comments'];
            
            $Plant->updated_at = Carbon::now()->toDateTimeString();
            $Plant->save();
            return redirect('plants');
    }

    /**
     * Display a page to delete a new Plant
     *
     */
    public function destroy($id) 
    {
        Plant::destroy($id);

        $plants = Plant::all();
        return view('plants.index', compact('plants'));
    }
}

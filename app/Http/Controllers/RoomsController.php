<?php

namespace App\Http\Controllers;

use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function index() {

        $rooms = Room::where('systemID', app('system')->id)->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create() {

        return view('rooms.create');
    }

    public function store(Request $request) 
    {
        // dd($request->all());
        $newRoom = Room::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('rooms');
    }


/**
     * Display a page to edit a new room
     *
     */
    public function edit($id) 
    {
        $room = Room::find($id);
        return view('rooms.edit')->with('room', $room);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $room = Room::find($request['id']);
        
            $room->name = $request['name'];
            $room->comments = $request['comments'];
            
            $room->updated_at = Carbon::now()->toDateTimeString();
            $room->save();
            return redirect('rooms');
    }

    /**
     * Display a page to delete a new room
     *
     */
    public function destroy($id) 
    {
        Room::destroy($id);

        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }
}

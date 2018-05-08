<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Plant;
use App\Note;
use Auth;

class NotesController extends Controller
{
    public function index($entity, $entityID) {
        
        $entityTable = \DB::table($entity . 's')->get(['id', 'name'])->where('id', '=', (int)$entityID)->first();        

        //dd($entityTable);
        $notes = Note::where('systemID', app('system')->id)
                        ->where('entity', $entity)
                        ->where('entityID', $entityID)
                        ->get();

               
        return view('notes.index')->with('notes', $notes)
                                ->with('entity', $entity)
                                ->with('entityID', $entityID)
                                ->with('entityName', $entityTable->name);
    } // end index

    /**
    * create
    */

    public function create($entity, $entityID) {

        $entityTable = \DB::table($entity . 's')->get(['id', 'name'])->where('id', '=', (int)$entityID)->first();        

        $entityDetail = [
            'entity' => $entity,
            'entityID' => $entityID,
            'entityName' => $entityTable->name
        ];
        
        return view('notes.create')->with('entityDetail', $entityDetail);
    }

     public function store(Request $request) 
    {
        //dd($request->all());

        $newNote = Note::create([
            'entity' => $request['entity'],
            'entityID' => (int)$request['entityID'],
            'userID' => Auth::user()->id,
            'comments' => $request['comments'],
            'share' => $request['share'],
            'imageFileName' => null,  //"$request['imageFileName']",
            'systemID' => app('system')->id, // from appServiceprovider
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ])->id;

        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads';
                $filename = 'note' . '_' . app('system')->id . '_' . $newNote . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  
                $filename = '/uploads' . '\\' . $filename;

                //  update the note with the images
                $note = Note::find($newNote);
                $note->imageFileName = $filename;
                $note->save();   

                if($request['entity'] == 'plant') {
                    $plant = Plant::find($request['entityID']);
                    $plant->imageFileName = $filename;
                    $plant->save();

                }
            }                
        }

        return redirect()->route('notes.index', [
            'entity' => $request['entity'], 
            'entityID' => $request['entityID']
        ]);

    } // end store

    public function edit($id) {
       // dd($id);
        $note = Note::find($id);
        return view('notes.edit')->with('note', $note);

    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $note = Note::find($request['id']);
        
        $note->comments = $request['comments'];
        $note->imageFileName = app('system')->imageFileName; //$request['imageFileName'];
        
        $note->updated_at = Carbon::now()->toDateTimeString();
        $note->save();
           
        return redirect()->route('notes.index', [
            'entity' => $request['entity'], 
            'entityID' => $request['entityID']
        ]);
    }

    /**
     * Display a page to delete a new room
     *
     */
    public function destroy($entity, $entityID, $id) 
    {
        
        Note::destroy($id);

        $note = Note::all();

        return redirect()->route('notes.index', [
            'entity' => $entity, 
            'entityID' => $entityID
        ]);
    }
    
}

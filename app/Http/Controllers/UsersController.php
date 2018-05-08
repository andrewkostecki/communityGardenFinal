<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {

        $users = User::where('systemID', app('system')->id)->get();
        return view('users.index', compact('users'));
    }

    public function create() {

        return view('users.create');
    }

    public function store(Request $request) 
    {
        //dd($request);
        $filename = "";
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads';
                $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  
                $filename = '/uploads' . '\\' . $filename;
                // $system->imageFileName = $filename;
            }                
        }


        $newUser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'systemID' => app('system')->id, // from appServiceprovider
            'password' => bcrypt($request['password']),
            'imageFileName' => $filename,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('users');
    }


/**
     * Display a page to edit a new user
     *
     */
    public function edit($id) 
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request) 
    {
       //print_r($_POST); 
       //dd($request->all()); 
       //dd($request->hasFile('imageFile'));
       // dd($request['imageFile']);
        $user = User::find($request['id']);
        
            $user->name = $request['name'];
            $user->email = $request['email'];
            
            if($request->hasFile('imageFileName')) {
                $file = $request->file('imageFileName');
                if($file) {
                    $destinationPath = public_path()  . '/uploads';
                    $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                    $file->move($destinationPath, $filename);  
                    $filename = '/uploads' . '\\' . $filename;
                    $user->imageFileName = $filename;
                }                
            }
                        
            $user->updated_at = Carbon::now()->toDateTimeString();
            $user->save();
            return redirect('users');
    }

    /**
     * Display a page to delete a new user
     *
     */
    public function destroy($id) 
    {
        User::destroy($id);

        $users = User::all();
        return view('users.index', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommunityController extends Controller
{
    

    public function index() {

        $notes = DB::select('select 
                                notes.*,
                                users.imageFileName as userImageFileName,
                                users.name as userName
                            from 
                                notes
                                inner join users on notes.userID = users.id
                            where
                                notes.share = \'Yes\' AND notes.entity = \'plant\'
                            order by 
                                notes.updated_at DESC');

        return view('community.index', compact('notes'));
    }



}

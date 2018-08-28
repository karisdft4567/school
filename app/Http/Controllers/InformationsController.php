<?php

namespace App\Http\Controllers;

use App\Information;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationsController extends Controller{


//create new post
    public function createInformation(Request $request){

        $Information = Information::create($request->all());

        return response()->json($Information);

    }

    //updates post
    public function updateInformation(Request $request, $id){

        $Information  = Information::find($id);
        $Information->title = $request->input('title');
        $Information->body = $request->input('body');
        $Information->views = $request->input('views');
        $Information->save();

        return response()->json($Information);
    }

//view post

    public function viewInformation($id){
        $Information  = Information::find($id);
        return response()->json($Information);
    }


//delete post
    public function deleteInformation($id){
        $Information  = Information::find($id);
        $Information->delete();

        return response()->json('Removed successfully.');
    }

//list post
    public function index(){

        $Information  = Information::all();

        return response()->json($Information);

    }
}
?>

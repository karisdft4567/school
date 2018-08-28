<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller{


//create new post
    public function createMessage(Request $request){

        $Message = Message::create($request->all());

        return response()->json($Message);

    }

    //updates post
    public function updateMessage(Request $request, $id){

        $Message  = Message::find($id);
        $Message->title = $request->input('title');
        $Message->body = $request->input('body');
        $Message->views = $request->input('views');
        $Message->save();

        return response()->json($Message);
    }

//view post

    public function viewMessage($id){
        $Message  = Message::find($id);
        return response()->json($Message);
    }


//delete post
    public function deleteMessage($id){
        $Message  = Message::find($id);
        $Message->delete();

        return response()->json('Removed successfully.');
    }

//list post
    public function index(){

        $Message  = Message::all();

        return response()->json($Message);

    }
}
?>

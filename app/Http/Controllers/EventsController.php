<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller{


//create new post
    public function createEvent(Request $request){

       $event = Event::create($request->all());

        return response()->json($event);

    }

    //updates post
    public function updateEvent(Request $request, $id){

       $event  = Event::find($id);
       $event->title = $request->input('title');
       $event->body = $request->input('body');
       $event->views = $request->input('views');
       $event->save();

        return response()->json($event);
    }

//view post

    public function viewEvent($id){
        $event  = Event::find($id);
        return response()->json($event);
    }


//delete post
    public function deleteEvent($id){
       $event  = Event::find($id);
       $event->delete();

        return response()->json('Removed successfully.');
    }

//list post
    public function index(){

       $event  = Event::all();

        return response()->json($event);

    }
}
?>

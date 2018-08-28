<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GallerysController extends Controller{


//create new post
    public function createGallery(Request $request){

        $Gallery = Gallery::create($request->all());

        return response()->json($Gallery);

    }

    //updates post
    public function updateGallery(Request $request, $id){

        $Gallery  = Gallery::find($id);
        $Gallery->title = $request->input('title');
        $Gallery->body = $request->input('body');
        $Gallery->views = $request->input('views');
        $Gallery->save();

        return response()->json($Gallery);
    }

//view post

    public function viewGallery($id){
        $Gallery  = Gallery::find($id);
        return response()->json($Gallery);
    }


//delete post
    public function deleteGallery($id){
        $Gallery  = Gallery::find($id);
        $Gallery->delete();

        return response()->json('Removed successfully.');
    }

//list post
    public function index(){

        $Gallery  = Gallery::all();

        return response()->json($Gallery);

    }
}
?>

<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewssController extends Controller{



//view post

    public function viewNews($id){
        $news  = News::find($id);


        return response()->json($news);
    }


//list post
    public function index(){

        $news  = News::all();

        return response()->json($news);

    }
}
?>

<?php

namespace App\Http\Controllers;

use App\Vacancy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VacanciesController extends Controller{


//create new post
    public function createVacancy(Request $request){

        $Vacancy = Vacancy::create($request->all());

        return response()->json($Vacancy);

    }

    //updates post
    public function updateVacancy(Request $request, $id){

        $Vacancy  = Vacancy::find($id);
        $Vacancy->title = $request->input('title');
        $Vacancy->body = $request->input('body');
        $Vacancy->views = $request->input('views');
        $Vacancy->save();

        return response()->json($Vacancy);
    }

//view post

    public function viewVacancy($id){
        $Vacancy  = Vacancy::find($id);
        return response()->json($Vacancy);
    }


//delete post
    public function deleteVacancy($id){
        $Vacancy  = Vacancy::find($id);
        $Vacancy->delete();

        return response()->json('Removed successfully.');
    }

//list post
    public function index(){

        $Vacancy  = Vacancy::all();

        return response()->json($Vacancy);

    }
}
?>

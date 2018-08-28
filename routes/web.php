<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->group(['prefix' => 'api/v1'], function($app)
{


    //events
    $app->group(['prefix' => 'events'], function($app)
    {

        $app->get('view/{id}','EventsController@viewEvent');

        $app->get('index','EventsController@index');
    });


    //news
    $app->group(['prefix' => 'news'], function($app)
    {

        $app->get('view/{id}','NewssController@viewNews');

         $app->get('index','NewssController@index');
    });



    //Gallery
    $app->group(['prefix' => 'galleries'], function($app)
    {

        $app->get('view/{id}','GallerysController@viewGallery');

        $app->get('index','GallerysController@index');
    });

    //information
    $app->group(['prefix' => 'informations'], function($app)
    {

        $app->get('view/{id}','InformationsController@viewInformation');

        $app->get('index','InformationsController@index');
    });

    //vacancy
    $app->group(['prefix' => 'vacancies'], function($app)
    {

        $app->get('view/{id}','VacanciesController@viewVacancy');

        $app->get('index','VacanciesController@index');
    });

    //Message
    $app->group(['prefix' => 'message'], function($app)
    {

        $app->get('view/{id}','MessageController@viewMessage');

        $app->get('index','MessageController@index');
    });




});
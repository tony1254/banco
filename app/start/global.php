<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});
/*
|--------------------------------------------------------------------------
| Custom Form Macros
|--------------------------------------------------------------------------
| se llama asi {{ Form::date('campo_fecha') }}

*/
 
Form::macro('date', function($name, $value = null, $options = array()) {
    $value = ((is_null($value) or $value == '')) ? \Input::get($name) : $value;
    $input =  '<input type="date" name="' . $name . '" value="' . $value . '"';
    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }
    return $input.'>';
});

/*
|--------------------------------------------------------------------------
| Custom Form Macros Universal
|--------------------------------------------------------------------------
|{{ Form:custom('date', 'campo_fecha') }}
|{{ Form:custom('number', 'campo_con_numeros') }}
|{{ Form:custom('url', 'campo_con_url') }}
|
De este modo podemos hacer uso de cualquier otro tipo de campo sólo indicando su nombre:
HTML5 New Input Types
HTML5 has several new input types for forms. These new features allow better input control and validation.

This chapter covers the new input types:

color
date
datetime
datetime-local
email
month
number
range
search
tel
time
url
week
*/
Form::macro('custom', function($type, $name, $value = null, $options = array()) {
    $value = ((is_null($value) or $value == '')) ? Input::old($name) : $value;
    $input =  '<input type="'. $type .'" name="' . $name . '" value="' . $value . '"';
    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }
    return $input.'>';
});
/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';


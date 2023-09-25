<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Route::get('/admin', function () {
//     return view('admin/home');
// }) -> name('admin.home');

/* Route Namespaces -> all routes below are referring to controller under a folder
(namespace) called 'Admin' under app*/
Route::group((['namespace' => 'Admin' ,'prefix' => 'adm'])
            , function ()
{

    route::get( '/','AdminController@showAdminName');
    route::get( '/admin','AdminController@middlewareExceptFn');

    route::resource( '/news','NewsController');

    //calling the original downloaded porfolio
    route::get('/folio' ,function(){

            return view('layouts.portfolio');

    });

    //calling default folio view
    route::get('/deffolio' ,function(){

            return view('defportfolio');

    });

    //calling special folio view
    route::get('/specfolio' ,function(){

            return view('specfolio');

    });



    route::get('/data' ,function(){

        //passing Data to views:

            //1
            //return view('Admin.adminData') -> with('data' ,9); <!--{{ $data }} passing data with 'with'-->

            //2
            // $data = [];
            // $data['id'] = 5;
            // $data['name'] = 'Abanoub Boshra Anis';
            // return view('Admin.adminData' ,compact('data'));
            //{{ $data['name'] }} , your ID Is : {{ $data['id'] }}

            //3
            $data =  new \stdClass();
            $data -> name = 'Abanoub Boshra Anis';
            $data -> age = 33;
            return view('Admin.adminData' ,compact('data'));


    });


}
);

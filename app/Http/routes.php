<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Rota index

Route::get('home',['as'=>'home','uses'=> 'LayoutController@index']);
Route::get('/',['as'=>'home','uses'=> 'LayoutController@index']);


Route::controllers([
    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController'
]);

Route::get('clients/create',['as'=>'clients.create','uses'=> 'ClientsController@create']);
Route::get('clients/edit/{id}',['as'=>'clients.edit','uses'=> 'ClientsController@edit']);
Route::post('clients/update/{id}',['as'=>'clients.update','uses'=> 'ClientsController@update']);
Route::post('clients/store',['as'=>'clients.store','uses'=> 'ClientsController@store']);



Route::group(['prefix'=>'admin','middleware'=>'auth.checkrole:admin','as'=>'admin.'],function(){

    Route::get('projects',['as'=>'projects.index','uses'=> 'ProjectsController@index']);
    Route::get('projects/create',['as'=>'projects.create','uses'=> 'ProjectsController@create']);
    Route::get('projects/edit/{id}',['as'=>'projects.edit','uses'=> 'ProjectsController@edit']);
    Route::post('projects/update/{id}',['as'=>'projects.update','uses'=> 'ProjectsController@update']);
    Route::post('projects/store',['as'=>'projects.store','uses'=> 'ProjectsController@store']);


    Route::get('documents',['as'=>'documents.index','uses'=> 'DocumentsController@index']);
    Route::get('documents/create',['as'=>'documents.create','uses'=> 'DocumentsController@create']);
    Route::get('documents/edit/{id}',['as'=>'documents.edit','uses'=> 'DocumentsController@edit']);
    Route::post('documents/update/{id}',['as'=>'documents.update','uses'=> 'DocumentsController@update']);
    Route::post('documents/store',['as'=>'documents.store','uses'=> 'DocumentsController@store']);
    Route::get('documents/destroy/{id}',['as'=>'documents.destroy','uses'=> 'DocumentsController@destroy']);

    Route::get('images/{id}',['as'=>'images.index','uses'=> 'DocumentImageController@index']);
    Route::get('images/create/{id}',['as'=>'images.create','uses'=> 'DocumentImageController@createImage']);
    Route::post('images/store/{id}',['as'=>'images.store','uses'=> 'DocumentImageController@storeImage']);
    Route::get('images/destroy/{id}',['as'=>'images.destroy','uses'=> 'DocumentImageController@destroyImage']);


    Route::get('clients',['as'=>'clients.index','uses'=> 'ClientsController@index']);
    Route::get('clients/admedit/{id}',['as'=>'clients.admedit','uses'=> 'ClientsController@admedit']);
    Route::get('clients/editfunction/{id}',['as'=>'clients.editfunction','uses'=> 'ClientsController@editfunction']);

    Route::get('orders',['as'=>'orders.index','uses'=> 'OrdersController@index']);
    Route::get('orders/teacher',['as'=>'orders.teacher','uses'=> 'OrdersController@teacher']);
    Route::get('orders/visure/{id}',['as'=>'orders.visure','uses'=> 'OrdersController@visure']);
    Route::get('orders/qtd',['as'=>'orders.qtd','uses'=> 'OrdersController@qtd']);

});


Route::group(['middleware'=>'auth.checkrole:client'],function(){

//Rota store
Route::get('store/index',['as'=>'store.index','uses'=> 'StoreController@index']);
Route::get('store/document/{id}',['as'=>'store.document','uses'=> 'StoreController@document']);
Route::get('store/create/{id}',['as'=>'store.create','uses'=> 'StoreController@create']);
Route::post('store/store',['as'=>'store.store','uses'=> 'StoreController@store']);
Route::get('store/edit/{id}',['as'=>'store.edit','uses'=> 'StoreController@edit']);

});

Route::group(['middleware'=>'auth.checkrole:admin'],function(){

//Rota store
    Route::get('management/index',['as'=>'management.index','uses'=> 'ManagementController@index']);
    Route::get('management/create/{id}',['as'=>'management.create','uses'=> 'ManagementController@create']);
    Route::post('management/store',['as'=>'management.store','uses'=> 'ManagementController@store']);

    Route::get('management/listing',['as'=>'management.listing','uses'=> 'ManagementController@listing']);
    Route::get('management/status/{id}',['as'=>'management.status','uses'=> 'ManagementController@status']);
    Route::get('management/statuszero/{id}',['as'=>'management.statuszero','uses'=> 'ManagementController@statuszero']);
    Route::get('management/work',['as'=>'management.work','uses'=> 'ManagementController@work']);

});






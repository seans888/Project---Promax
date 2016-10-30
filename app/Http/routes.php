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
//the route name 'as' is linked to table 'AccessLevel'.'code'
Route::auth();
//get
	Route::get('/', 'HomeController@index');

	Route::get('/', [
	    'uses' => 'HomeController@index',
	    'as' => 'dashboard']);
	Route::get('/home', ['uses' =>'HomeController@index', 'as' => 'home']);
	Route::get('/dashboard', ['uses' => 'HomeController@dashboard', 'as' => 'dashboard']);
	Route::get('/usertypes',['uses'=>'UserTypeController@UserTypes','as'=>'usertypes','middleware' => 'roles']);
	Route::get('/usertype/{code}', ['uses'=>'UserTypeController@getUserType', 'as' => 'usertypes','middleware' => 'roles']);
	Route::get('/usertype/', ['uses'=>'UserTypeController@newUserType', 'as' => 'usertypes','middleware' => 'roles']);
	
	Route::get('/users',['uses'=>'UserController@users','as'=>'users','middleware' => 'roles']);
	Route::get('/user/{id}', ['uses'=>'UserController@getUser', 'as' => 'users','middleware' => 'roles']);
	Route::get('/user/', ['uses'=>'UserController@newUser', 'as' => 'users','middleware' => 'roles']);

	Route::get('/myaccount',['uses'=>'HomeController@myaccount','as'=>'myaccount']);
	Route::get('/company', ['uses'=>'CompanyController@company', 'as' => 'company']);
		Route::get('/company/{id}', ['uses'=>'CompanyController@getCompany', 'as' => 'company']);
	Route::get('/property/list', ['uses'=>'PropertyController@PropertyList', 'as' => 'properties','middleware' => 'roles']);
	Route::get('/property/new', ['uses'=>'propertyController@newproperty', 'as' => 'properties','middleware' => 'roles']);
	Route::get('/property/get/{id}', ['uses'=>'propertyController@getproperty', 'as' => 'properties','middleware' => 'roles']);


	Route::get('/reservationcontract/list', ['uses'=>'ReservationContractController@ReservationContractList', 'as' => 'enterreservationcontract','middleware' => 'roles']);
	Route::get('/reservationcontract/new', ['uses'=>'ReservationContractController@newReservationContract', 'as' => 'enterreservationcontract','middleware' => 'roles']);
	Route::get('/reservationcontract/get/{id}', ['uses'=>'ReservationContractController@getReservationContract', 'as' => 'enterreservationcontract','middleware' => 'roles']);
	
	Route::get('/unittype/list', ['uses'=>'UnittypeController@unittypelist', 'as' => 'unittype','middleware' => 'roles']);
	Route::get('/unittype/new', ['uses'=>'UnittypeController@newunittype', 'as' => 'unittype','middleware' => 'roles']);
	Route::get('/unittype/get/{id}', ['uses'=>'UnittypeController@getunittype', 'as' => 'unittype','middleware' => 'roles']);
	
	Route::get('/tenant/list', ['uses'=>'TenantController@tenantlist', 'as' => 'tenant','middleware' => 'roles']);
	Route::get('/tenant/new', ['uses'=>'TenantController@newtenant', 'as' => 'tenant','middleware' => 'roles']);
	Route::get('/tenant/get/{id}', ['uses'=>'TenantController@gettenant', 'as' => 'tenant','middleware' => 'roles']);
	
	Route::get('/units/list', ['uses'=>'UnitsController@unitslist', 'as' => 'units','middleware' => 'roles']);
	Route::get('/units/new', ['uses'=>'UnitsController@newunits', 'as' => 'units','middleware' => 'roles']);
	Route::get('/units/get/{id}', ['uses'=>'UnitsController@getunits', 'as' => 'units','middleware' => 'roles']);
	
	Route::get('/dss', ['uses'=>'DecisionSupportController@dss', 'as' => 'dss','middleware' => 'roles']);

//posts
	Route::post('/company/{id}', ['uses'=>'CompanyController@postCompany','middleware' => 'roles']);
	Route::post('/saveAccountDetails', ['uses'=>'HomeController@postSaveAccountDetails','middleware' => 'roles']);
	Route::post('/changePassword', ['uses'=>'HomeController@postChangePassword']);
	Route::post('/usertype/', ['uses'=>'UserTypeController@postUserType', 'as' => 'postUserType','middleware' => 'roles']);
	Route::post('/usertype/{code}', ['uses'=>'UserTypeController@postUserType', 'as' => 'postUserType','middleware' => 'roles']);
	Route::post('/user/', ['uses'=>'UserController@postUser', 'as' => 'postUser','middleware' => 'roles']);
	Route::post('/user/{id}', ['uses'=>'UserController@postUser', 'as' => 'postUser','middleware' => 'roles']);
	Route::post('/property/get/{id}', ['uses'=>'propertyController@postproperty', 'as' => 'postproperty','middleware' => 'roles']);
	Route::post('/property/new/', ['uses'=>'propertyController@postproperty', 'as' => 'postproperty','middleware' => 'roles']);
	Route::post('/property/delete/{id}', ['uses'=>'propertyController@deleteproperty', 'as' => 'deleteproperty']);
	Route::post('/unittype/get/{id}', ['uses'=>'unittypeController@postunittype', 'as' => 'postunittype','middleware' => 'roles']);
	Route::post('/unittype/new/', ['uses'=>'unittypeController@postunittype', 'as' => 'postunittype','middleware' => 'roles']);
	Route::post('/unittype/delete/{id}', ['uses'=>'unittypeController@deleteunittype', 'as' => 'deleteunittype']);
	Route::post('/units/get/{id}', ['uses'=>'UnitsController@postunits', 'as' => 'postunits','middleware' => 'roles']);
	Route::post('/units/new/', ['uses'=>'UnitsController@postunits', 'as' => 'postunits','middleware' => 'roles']);
	Route::post('/units/delete/{id}', ['uses'=>'UnitsController@deleteunits', 'as' => 'deleteunits']);
	Route::post('/tenant/get/{id}', ['uses'=>'TenantController@posttenant', 'as' => 'tenant','middleware' => 'roles']);
	Route::post('/tenant/new/', ['uses'=>'TenantController@posttenant', 'as' => 'tenant','middleware' => 'roles']);
	Route::post('/tenant/delete/{id}', ['uses'=>'TenantController@deletetenant', 'as' => 'tenant']);
	Route::post('/deleteUserType/{code}', ['uses'=>'UserTypeController@deleteUserType', 'as' => 'deleteUserType']);
	Route::post('/deleteUser/{id}', ['uses'=>'UserController@deleteUser', 'as' => 'deleteUser','middleware' => 'roles']);
	Route::post('/deleteUser/username/{username}', ['uses'=>'UserController@deleteUserByUsername', 'as' => 'deleteUser']);
	Route::post('/delete/tenant/{id}',['uses' => 'TenantController@deletetenant', 'as' => 'deletetenant']);
	Route::post('/course/{id}',['uses'=>'CourseController@postcourse','as'=>'postcourse','middleware' => 'roles']);
	Route::post('/tenant/{id}',['uses'=>'TenantController@posttenant','as'=>'posttenant','middleware' => 'roles']);
	Route::post('/update/tenant/{id}',['uses'=>'TenantController@posttenant','as'=>'posttenant','middleware' => 'roles']);
	Route::post('/usertypeaccesslevel/{id}',['uses'=>'UserTypeController@updateusertypeaccesslevel','as'=>'updateusertypeaccesslevel']);
	Route::post('/reservationcontract/get/{id}', ['uses'=>'ReservationContractController@postReservationContract', 'as' => 'postReservationContract','middleware' => 'roles']);
	Route::post('/reservationcontract/new', ['uses'=>'ReservationContractController@postReservationContract', 'as' => 'postReservationContract','middleware' => 'roles']);
	Route::post('/reservationcontract/delete/{id}', ['uses'=>'ReservationContractController@deleteReservationContract', 'as' => 'deleteReservationContract']);
	Route::post('/reservationcontract/delete2/{id}', ['uses'=>'ReservationContractController@deleteReservationContract2', 'as' => 'deleteReservationContract']);
	
//API
	Route::get('/api/company/{id}', ['uses'=>'CompanyController@apiCompany']);
	Route::get('/api/UserType/{code}', ['uses'=>'UserTypeController@apiUserType']);
	Route::get('/api/user/{username}', ['uses'=>'UserController@apiuser']);
	Route::get('/api/user/id/{id}', ['uses'=>'UserController@apiuserById']);
	Route::get('/unit/api/getbyproperty/{id}', ['uses'=>'UnitController@apigetbyproperty']);


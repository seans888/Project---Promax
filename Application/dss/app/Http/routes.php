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
	    'as' => 'dashboard'
	]);
	Route::get('/home', ['uses' =>'HomeController@index', 'as' => 'home']);
	Route::get('/dashboard', ['uses' => 'HomeController@dashboard', 'as' => 'dashboard']);
	Route::get('/usertypes',['uses'=>'UserTypeController@UserTypes','as'=>'usertypes']);
	Route::get('/usertype/{code}', ['uses'=>'UserTypeController@getUserType', 'as' => 'getUserType']);
	Route::get('/usertype/', ['uses'=>'UserTypeController@newUserType', 'as' => 'newUserType']);
	
	Route::get('/users',['uses'=>'UserController@users','as'=>'users']);
	Route::get('/user/{id}', ['uses'=>'UserController@getUser', 'as' => 'getUser']);
	Route::get('/user/', ['uses'=>'UserController@newUser', 'as' => 'newUser']);

	Route::get('/myaccount',['uses'=>'HomeController@myaccount','as'=>'myaccount']);
	Route::get('/company', ['uses'=>'CompanyController@company', 'as' => 'company']);
		Route::get('/company/{id}', ['uses'=>'CompanyController@getCompany', 'as' => 'getCompany']);
	Route::get('/projects', ['uses'=>'BranchController@branches', 'as' => 'branches']);
	Route::get('/project/', ['uses'=>'BranchController@newbranch', 'as' => 'newbranch']);
	Route::get('/project/{id}', ['uses'=>'BranchController@getbranch', 'as' => 'getbranch']);
//posts
	Route::post('/company/{id}', ['uses'=>'CompanyController@postCompany']);
	Route::post('/saveAccountDetails', ['uses'=>'HomeController@postSaveAccountDetails']);
	Route::post('/changePassword', ['uses'=>'HomeController@postChangePassword']);
	Route::post('/usertype/', ['uses'=>'UserTypeController@postUserType', 'as' => 'postUserType']);
	Route::post('/usertype/{code}', ['uses'=>'UserTypeController@postUserType', 'as' => 'postUserType']);
	Route::post('/user/', ['uses'=>'UserController@postUser', 'as' => 'postUser']);
	Route::post('/user/{id}', ['uses'=>'UserController@postUser', 'as' => 'postUser']);
	Route::post('/project/{id}', ['uses'=>'BranchController@postbranch', 'as' => 'postbranch']);
	Route::post('/project', ['uses'=>'BranchController@postbranch', 'as' => 'postbranch']);

	Route::post('/deleteUserType/{code}', ['uses'=>'UserTypeController@deleteUserType', 'as' => 'deleteUserType']);
	Route::post('/deleteUser/{id}', ['uses'=>'UserController@deleteUser', 'as' => 'deleteUser']);
	Route::post('/deleteUser/username/{username}', ['uses'=>'UserController@deleteUserByUsername', 'as' => 'deleteUser']);
	Route::post('/delete/tenant/{id}',['uses' => 'TenantController@deletetenant', 'as' => 'deletetenant']);
	Route::post('/course/{id}',['uses'=>'CourseController@postcourse','as'=>'postcourse']);
	Route::post('/tenant/{id}',['uses'=>'TenantController@posttenant','as'=>'posttenant']);
	Route::post('/update/tenant/{id}',['uses'=>'TenantController@posttenant','as'=>'posttenant']);
	
//API
	Route::get('/api/company/{id}', ['uses'=>'CompanyController@apiCompany']);
	Route::get('/api/UserType/{code}', ['uses'=>'UserTypeController@apiUserType']);
	Route::get('/api/user/{username}', ['uses'=>'UserController@apiuser']);
	Route::get('/api/user/id/{id}', ['uses'=>'UserController@apiuserById']);


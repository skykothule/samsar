<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


/* home controller */

 Route::get('/', 'DashboardController@index');
 Route::get('/home', 'HomeController@index');
 Route::get('/contactus', 'HomeController@contactus');
 Route::get('/quotation', 'HomeController@quotation');
 Route::get('/customerlogin', 'CustomerController@index');
 Route::get('/customerhome', 'CustomerController@customerDashboard');
 Route::get('/customerfaq', 'CustomerController@faq');
 Route::get('/reviews', 'CustomerController@reviews');
 Route::get('/customerservice', 'CustomerController@customerservice');
 Route::get('/customerlogout', 'CustomerController@customerlogout');
 Route::post('/customerlogin', 'CustomerController@customerlogin');
 Route::get('/reset_password', 'CustomerController@reset_password');
 Route::get('/createaccount', 'CustomerController@createaccount');
 Route::post('/createaccount', 'CustomerController@store');

Route::get('/login', 'DashboardController@index');
Route::get('/admin', 'DashboardController@index');
Route::get('/logout', 'DashboardController@index');

Auth::routes();
Route::get('/master', "master@index");
Route::get('/registration', "UserController@registration");
Route::get('/userlist', "UserController@index");
Route::post('/store', "UserController@store");
Route::get('/edit/{id}', "UserController@edit");
Route::get('/show/{id}', "UserController@show");
Route::post('/update/{id}', "UserController@update");
Route::get('/destroy/{id}', "UserController@destroy");
Route::post('/upload/{id}', "UserController@upload");
Route::post('/authentication/{id}', "UserController@authentication");
Route::post('/importcsv', "UserController@importcsv");
Route::get('/import', "UserController@importuser");
Route::get('/profile', "UserController@profile");
Route::get('/profileEdit', "UserController@profileEdit");
Route::get('/export', "UserController@xlsexport");
Route::get('/pdf', "UserController@pdfexport");
Route::get('/usersprint', "UserController@userlistprint");

Route::get('/orderlist', "OrderController@index");
Route::get('/createorder', "ItemController@create");
Route::post('/storeorder', "ItemController@store");
Route::get('/showorder/{id}/{orgid}', "ItemController@show");
Route::get('/ordershow', "ItemController@show");
Route::get('/orderimport', "ItemController@importorder");
Route::post('/orderimportcsv', "ItemController@importcsv");
Route::get('/exportitem/{id}', "ItemController@xlsexport");
Route::post('/saildateupdate', "OrderController@sailUpdate");
Route::get('/asf/{id}', "OrderController@bedispatch");
Route::get('/pas/{id}', "OrderController@dispatch");


Route::get('/trackingimport/{id}', "ItemController@importtracking");
Route::get('/exporttracking/{id}', "ItemController@xlsexporttracking");
Route::post('/trackingimportcsv', "ItemController@importcsvtracking");
Route::post('/itemstatus', "ItemController@changeitemstatus");

/* Company */
Route::get('/company', "CompanyController@companyList");
Route::get('/companyregistration', "CompanyController@addCompany");
Route::post('/companystore', "CompanyController@storeCompany");
Route::get('/companyEdit/{id}', "CompanyController@companyEdit");
Route::post('/companyUpdate', "CompanyController@companyUpdate");

/* Customer */
Route::get('/customers', 'UserController@customers');
Route::get('/customerdetails/{id}', 'UserController@customerdetails');
Route::get('/customerpdf', "UserController@customerpdfexport");
Route::get('/destroycustomer/{id}', "UserController@destroycustomer");

/* send email */

Route::get('/sendemail', "UserController@sendemail");
Route::post('/user/sendemail', "UserController@sendemail");

/* username and email exists ajax check */
Route::post('/uniqueuser', "UserController@uniqueuser");
Route::post('/uniqueemail', "UserController@uniqueemail");
Route::post('/uniqueuser_edit', "UserController@uniqueuser_edit");
Route::post('/uniqueemail_edit', "UserController@uniqueemail_edit");

/* Social Login facebook,google,twitter */
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');


// Route::get('home', array('as' => 'home', 'uses' => function(){
  // return view('home');
// }));


/* Language */
Route::get('/language', "LanguageController@index");
Route::post('LanguageController/store', ['as' => 'languages.store', 'uses' => 'LanguageController@store']);
Route::get('LanguageController/edit/{id}', "LanguageController@edit");
Route::post('LanguageController/update/{id}', "LanguageController@update");
Route::get('LanguageController/chooser_language/{id}',"LanguageController@chooser_language" );
Route::get('/LanguageController/destroy/{id}/{lan}', "LanguageController@destroy");

/* roles and Permission */
Route::get('/roles', "RoleController@index");
Route::get('/RoleController/edit/{id}', "RoleController@edit");
Route::post('roles', ['as' => 'roles.store', 'uses' => 'RoleController@store']);
Route::post('RoleController/update/{id}','RoleController@update');
Route::get('/RoleController/destroy/{id}', "RoleController@destroy");

//Route::post('/roles', "RoleController@index");
Route::get('/permissions', "PermissionController@index");
Route::get('/PermissionController/edit/{id}', "PermissionController@edit");
Route::post('permissions', ['as' => 'permission.store','uses' => 'PermissionController@store']);
Route::post('PermissionController/update/{id}','PermissionController@update');
Route::post('permissions/save', ['as' => 'permission.save', 'uses' => 'PermissionController@saveRolePermissions']);
Route::get('/PermissionController/destroy/{id}', "PermissionController@destroy");

/* User Activity activity */ 
Route::get('/activity/', "ActivityController@index");
Route::get('/activity/user/{id}', "ActivityController@activity_user");

/* Setting */ 
Route::get('/settings/', "SettingController@index");
Route::post('/settings/', "SettingController@store");
Route::post('/SettingController/upload/{id}', "SettingController@upload");
Route::post('/SettingController/auth_registration', "SettingController@auth_registration");

Route::get('/SettingController/sidebar', "SettingController@sidebar");

/* Dashboard */ 
Route::get('/dashboard/', "DashboardController@index");


/* Message */ 
Route::get('/message/', "MessageController@index");
Route::get('/SendMessage/', "MessageController@sendmail");
Route::get('/sendDetails/{id}', "MessageController@sendDetails");
Route::get('/inboxDetails/{id}/{replayidid}', "MessageController@inboxDetails");
Route::post('MessageController/save/', "MessageController@store");
Route::post('MessageController/destroy/', "MessageController@destroy");



/* Authentication routes...*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::auth();
Route::resource('permission', 'PermissionsController');


Route::get('/logout', 'DashboardController@index');






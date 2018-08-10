<?php

use App\Http\Resources\movieResource;

//front-end
Route::get('/', function(){
    return view('front.pages.home');
});

Route::get('/clinics','front\clinicsController@index');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('clinics', 'Admin\ClinicsController');
    Route::post('clinics_mass_destroy', ['uses' => 'Admin\ClinicsController@massDestroy', 'as' => 'clinics.mass_destroy']);
    Route::post('clinics_restore/{id}', ['uses' => 'Admin\ClinicsController@restore', 'as' => 'clinics.restore']);
    Route::delete('clinics_perma_del/{id}', ['uses' => 'Admin\ClinicsController@perma_del', 'as' => 'clinics.perma_del']);
    Route::resource('botoxes', 'Admin\BotoxesController');
    Route::post('botoxes_mass_destroy', ['uses' => 'Admin\BotoxesController@massDestroy', 'as' => 'botoxes.mass_destroy']);
    Route::post('botoxes_restore/{id}', ['uses' => 'Admin\BotoxesController@restore', 'as' => 'botoxes.restore']);
    Route::delete('botoxes_perma_del/{id}', ['uses' => 'Admin\BotoxesController@perma_del', 'as' => 'botoxes.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');




});
Route::get('/moviesapi','MovieController@get_imdb')->name('movie-get');
// Route::get('/moviesapi', function(){
//      $movie = App\Movie::find(1);
//      return new movieResource($movie);
// });
Route::post('/moviesapi', 'MovieController@search_movie')->name('movie-search');

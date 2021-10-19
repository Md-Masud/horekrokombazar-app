<?php
use Illuminate\Support\Facades\Route;
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::group(['middleware'=>['auth', 'is_admin'],'as'=>'admin.','prefix'=>'admin','namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::get('dashboard','AdminController@index')->name('dashboard');
    Route::get('logout','AdminController@logout')->name('logout');
    Route::get('password/change','AdminController@PasswordChange')->name('password.change');
    Route::post('password/update','AdminController@UpdatePassword')->name('update.password');
    Route::resource('category','CategoryController');
    Route::get('category/edit/{id}','CategoryController@edit');
});

//Route::get('admin/login',[App\Http\Controllers\HomeController::class, 'adminLogin']);

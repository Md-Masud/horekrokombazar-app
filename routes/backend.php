<?php
use Illuminate\Support\Facades\Route;
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
Route::group(['middleware'=>['auth', 'is_admin'],'as'=>'admin.','prefix'=>'admin','namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::get('dashboard','AdminController@index')->name('dashboard');
    Route::get('logout','AdminController@logout')->name('logout');
    Route::get('password/change','AdminController@PasswordChange')->name('password.change');
    Route::post('password/update','AdminController@UpdatePassword')->name('update.password');
    //category Route
    Route::resource('category','CategoryController');
    //Subcategory
    Route::resource('subcategory','SubCategoryController');
    //childcategory
    Route::resource('childcategory','ChildCategoryController');
    Route::get('cat',[App\Http\Controllers\Admin\ChildCategoryController::class,'cat']);
    // brand
    Route::resource('brand','BrandController');
    //SEO
    Route::get('seo/edit','SeoController@edit')->name('seo.edit');
    Route::post('seo/update/{id}','SeoController@update')->name('seo.update');

});


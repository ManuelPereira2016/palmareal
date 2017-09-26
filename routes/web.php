<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 				    'WebController@index');
Route::get('constructora',          'WebController@constructora');
Route::get('inmobiliaria',          'WebController@inmobiliaria');
Route::post('inmobiliaria',          'WebController@search')->name('search');
// Route::get('inmobiliaria/venta',    'WebController@venta');
// Route::get('inmobiliaria/renta',    'WebController@renta');
Route::get('inmobiliaria/propiedad/{id}',    'WebController@propiedad');
Route::get('corretaje',             'WebController@corretaje');
Route::get('contacto',              'WebController@contacto');
Route::post('contacto',              'WebController@contactoSend')->name('contacto.send');
Route::post('enviar-mensaje', 'WebController@sendMessage')->name('sendMessage');

Route::get('property-location', 'WebController@getPropertyLocation');
//Rutas para el login de administradores

//Rutas para el login de usuarios
Auth::routes();
	
/*Rutas para el login de admin*/
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::post('admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.reset');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/register', 'Admin\RegisterController@register');
Route::get('admin/register',  'Admin\RegisterController@showRegistrationForm')->name('admin.register');


		


Route::group(['middleware' => 'auth'], function () {
	
});


/* Rutas del sistema de administracion */
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('admin',                             'Admin\PanelController@index');
    Route::get('admin/historial',                  'Admin\PanelController@historical')->name('historical.index');
    Route::post('admin/maps/{id}',                             'Admin\PanelController@changeMap')->name('maps.change');
    Route::resource('admin/imagen/',                'Admin\ImageController');
    Route::post('admin/propiedades/cambiar-estatus/{id}',            'Admin\PropertyController@status')->name('propiedades.status');
    Route::resource('admin/propiedades',            'Admin\PropertyController');
    Route::post('rate-property', 'Admin\PropertyController@rateProperty')->name('rateProperty');
    Route::get('delete-comment/{id}',   'Admin\PropertyController@commentDelete')->name('commentDelete');
    Route::get('get-rate-property', 'Admin\PropertyController@getRateProperty')->name('getRateProperty');
    Route::post('add-comment',   'Admin\PropertyController@commentSend')->name('commentSend');
    Route::resource('admin/tipos',                  'Admin\TypeController');
    Route::post('admin/administradores/cambiar-estatus/{id}',            'Admin\AdminController@status')->name('administradores.status');    
    Route::post('admin/administradores/cambiar-clave/{id}',            'Admin\AdminController@changePassword')->name('administradores.password');
    Route::resource('admin/mensajes',        'Admin\MessageController');
    Route::resource('admin/administradores',        'Admin\AdminController');
    Route::resource('admin/imagen',                  'Admin\ImageController');
    Route::get('admin/paginas/ver-banner/{id}',                  'Admin\PageController@showBanner')->name('paginas.imagen.show');
    Route::post('admin/paginas/crear-banner',                  'Admin\PageController@storeBanner')->name('paginas.imagen.store');
    Route::post('admin/paginas/modificar-banner/{id}',                  'Admin\PageController@updateBanner')->name('paginas.imagen.update');
    Route::post('admin/paginas/eliminar-banner/{id}',                  'Admin\PageController@destroyBanner')->name('paginas.imagen.destroy');
    Route::resource('admin/paginas',                  'Admin\PageController');
    Route::get('admin/header',   'Admin\HeaderController@show')->name('header-show');
    Route::get('admin/header/edit', 'Admin\HeaderController@edit')->name('header-edit');
    Route::post('admin/header/edit/{id}', 'Admin\HeaderController@update')->name('header-update');
    Route::post('admin/perfil/cambiar-contraseña/{id}',                 'Admin\PerfilController@changePassword');
    Route::post('/page/image-upload/{id}',                 'Admin\PageController@imageUpload')->name('image-upload');
    Route::resource('admin/perfil',                 'Admin\PerfilController');
    Route::resource('admin/roles',                 'Admin\RoleController');
    Route::resource('admin/banners',              'Admin\BannerController');  
    Route::resource('admin/tags',              'Admin\TagController');       
    Route::get('admin/logs',                         '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index');
});
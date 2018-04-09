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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::group(['prefix'=>'role','as'=>'role.','middleware' => ['role:administrador']],function(){
  Route::get('/',['uses'=>'RoleController@index'])->name('index');
  Route::post('/',['uses'=>'RoleController@store'])->name('store');
  Route::get('/{id}',['uses'=>'RoleController@show'])->name('show');
  Route::get('/{id}',['uses'=>'RoleController@edit'])->name('edit');
  Route::post('/{id}',['uses'=>'RoleController@update'])->name('update');
  Route::get('/create',['uses'=>'RoleController@create'])->name('create');
});
Route::group(['prefix'=>'user','as'=>'user.','middleware' => ['role:administrador']],function(){
  Route::get('/',['uses'=>'UserController@index'])->name('index');
  Route::post('/',['uses'=>'UserController@store'])->name('store');
  Route::get('/{id}',['uses'=>'UserController@show'])->name('show');
  Route::get('/{id}',['uses'=>'UserController@edit'])->name('edit');
  Route::post('/{id}',['uses'=>'UserController@update'])->name('update');
  Route::get('/create',['uses'=>'UserController@create'])->name('create');
});
Route::resource('course','CourseController',['middleware' => ['role:administrador']]);
Route::resource('student','StudentController');
Route::resource('permission','PermissionController',['middleware' => ['role:administrador']]);
Route::resource('group','GroupController',['middleware' => ['role:administrador']]);
Route::get('voucher/create', [
    'as' => 'voucher.create',
    'uses' => 'VoucherController@create'
]);
Route::get('voucher/','VoucherController@index')->name('voucher.index');
Route::post('voucher/', [
    'as' => 'voucher.store',
    'uses' => 'VoucherController@store'
]);
Route::delete('voucher/{id}', [
    'as' => 'voucher.destroy',
    'uses' => 'VoucherController@destroy'
]);
Route::get('mail/{id}', 'VoucherController@mail')->name('voucher.email');
Route::get('rolegiven/{id}','RoleController@rolgiven',['middleware' => ['role:administrador']])->name('role.rolegiven');
Route::post('studentrol','RoleController@studentrol',['middleware' => ['role:administrador']])->name('role.studentrol');
Route::post('/userrole/{id}', 'UserController@userrole');
Route::resource('studentgroup','StudentPresencialController');
Route::get('/mycourses','MyCourseController@index')->name('mycourses.index');
Route::post('/mycourse/{id}','MyCourseController@store')->name('mycourses.store');
Route::post('/handle/presencial/{id}','StudentPresencialController@certificado')->name('presencial.certificado');
Route::post('/handle/online/{id}','StudentOnlineController@certificado')->name('online.certificado');
Route::get('/presencial','StudentPresencialController@index',['middleware' => ['role:administrador']])->name('presencial.index');
Route::get('/online','StudentOnlineController@index',['middleware' => ['role:administrador']])->name('online.index');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index',['middleware' => ['role:administrador']]);
Route::post('/acceptvoucher/{id}','RoleController@acceptvoucher')->name('role.acceptvoucher');
Route::get('/seegroupbycourse/{id}',function($id){
  $groups=Group::where('course_id',$id)->take(5)->get();
  return Response::json($groups);
});
Route::get('/ajax-presencial/{id}',function($id){
  $courses=DB::table('courses')->select('id','nombre')->where('presencial',1)->get();
  return Response::json($courses);
});
Route::get('/ajax-online/{id}',function($id){
  $courses=DB::table('courses')->select('id','nombre')->where('online',1)->get();
  return Response::json($courses);
});
Route::get('/ajax-inicios/{id}',function($id){
  return Response::json(App\Group::where('course_id', $id)->where('disponibilidad',1)->take(5)->get());
});
Route::post('/conclude/{id}','GroupController@conclude',['middleware' => ['role:administrador']])->name('group.conclude');
Route::post('/disponibility/{id}','GroupController@disponibility',['middleware' => ['role:administrador']])->name('group.disponibility');
Route::get('/certificado/presencial/pdu/{id}','VoucherController@certificadopresencialpdu')->name('voucher.certificadopresencialpdu');
Route::get('/certificado/online/pdu/{id}','VoucherController@certificadoonlinepdu')->name('voucher.certificadoonlinepdu');
Route::get('/test/{id}','VoucherController@test');
Route::get('/firstfillmatricula/{id}','VoucherController@firstfillmatricula')->name('student.fillmatricula');
//STORAGE ROUTES
Route::get('/archivo','FileController@archivo')->name('archivo');
Route::get('/see/comprobante/{id}','FileController@comprobante')->name('file.comprobante');

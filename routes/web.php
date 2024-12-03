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
Route::get('/index', function () {
    return "HELLO";
});

route::resource('student','StudentController')->middleware('auth.basic');
Route::get("/download-pdf","RecordController@downloadPDF");
route::resource('record','RecordController')->middleware('auth.basic');
Route::get('record/create/{id}','RecordController@create');
Route::get('student/ajax/{id}',array('as'=>'student.ajax','uses'=>'StudentController@myformAjax'));
Route::get('/search',array('as'=>'searchajax','uses'=>'StudentController@search'));
Route::get('studentsearch','StudentController@searchIn');
Route::get('studentsearchgroup','StudentController@searchGp');
Route::post('searchResult','StudentController@searchResult')->name('student.result');
Route::get('scholarmasterlist','StudentController@masterlist');
Route::get('contactlisting','StudentController@contactlisting');
Route::post('clResult','StudentController@clResult')->name('student.clresult');
route::resource('admins','AdminsController')->middleware('auth.basic');
route::get('admins/{id}/{type}/edit','AdminsController@edit');
route::delete('admins/{id}/{type}','AdminsController@destroy');
Route::post('mlResult','StudentController@mlResult')->name('student.mlresult');
Route::get('ratings/{id}','StudentController@ratings');
Route::get('cratings/{id}','StudentController@cratings');
Route::post('ratingresult','StudentController@ratingresult');
Route::get('requirements/{id}','StudentController@requirements');
Route::get('adminupdateall','StudentController@updateall');
Route::post('adminupdateallres','StudentController@auResult')->name('student.auresult');
Route::post('updatedall','StudentController@updatedall');
Route::get('eilisting','StudentController@eilisting');
Route::post('eiResult','StudentController@eiResult')->name('student.eiresult');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('remark/{id}','RecordController@remark')->name('record.remark');
Route::get('createremark/{id}','RecordController@createremark')->name('record.createremark');
Route::delete('remdestroy/{remark}','RecordController@remdestroy')->name('record.remdestroy');
Route::post('createrem','RecordController@createrem')->name('student.createrem');

route::resource('exam','QuestionController');
Route::post('examination/','QuestionController@examstart')->name('exam.examstart');
Route::post('congrats','QuestionController@examdone')->name('exam.examdone');
Route::get('examresults','RecordController@examresults');
Route::post('exResult','RecordController@exResult')->name('student.exresult');

Route::get('payrolllist','StudentController@payrolllist');
Route::post('mlPayroll','StudentController@mlPayroll')->name('student.mlpayroll');

Route::get('grouplist','RecordController@iplist');
Route::post('groupresult','RecordController@ipResult')->name('student.ipresult');

Route::get('lgulist','RecordController@lgulist');
Route::post('lguresult','RecordController@lguResult')->name('student.lguresult');

Route::get('comserve','RecordController@comserve');
Route::post('comserveresult','RecordController@comserveResult')->name('student.comserveresult');

route::resource('shschools','SHController')->middleware('auth.basic');

Route::get('reports','RecordController@reportlist');
Route::post('reportresult','RecordController@reportResult')->name('student.reportresult');

Route::get('lgubrgy','SearcherController@lgubrgylist');
Route::post('lgubrgyresult','SearcherController@lgubrgyResult')->name('student.lgubrgyresult');

Route::get('lgugo','SearcherController@lgugolist');
Route::post('lgugoresult','SearcherController@lgugoResult')->name('student.lgugoresult');

route::resource('screcord','ContactController')->middleware('auth.basic');

Route::get('screcordshow','ContactController@scshow');
Route::post('screcordresult','ContactController@screcordResult')->name('student.screcordresult');

Route::get('reqshow','ContactController@reqshow');
Route::post('reqresult','ContactController@reqResult')->name('student.reqresult');

Route::get('screcordshow2','ContactController@scshow2');
Route::post('screcordresult2','ContactController@screcordResult2')->name('student.screcordresult2');

Route::get('schoolsearches','ContactController@searchIn');
Route::get('/searchs',array('as'=>'searchajax','uses'=>'ContactController@search'));


Route::get('/screcord/addcons/{id}','ContactController@addcons');
Route::post('addconsgo','ContactController@addconsgo')->name('student.addconsgo');

Route::get('/screcord/addrecs/{id}','ContactController@addrecs');
Route::post('addrecsgo','ContactController@addrecsgo')->name('student.addrecsgo');

Route::get('/editrecs/{id}','ContactController@editrecs');
Route::post('editrecsgo','ContactController@editrecsgo')->name('student.editrecsgo');
Route::delete('delrecsgo/{id}','ContactController@delrecsgo')->name('student.delrecsgo');

route::resource('documents','DocuController')->middleware('auth.basic');
Route::get('docuRecs','DocuController@index');
Route::get('adddocu','DocuController@create');
Route::get('docusearches','DocuController@searchIn');
Route::get('/searchsdocs',array('as'=>'searchajax','uses'=>'DocuController@searchsdocs'));
Route::post('/docuResult','DocuController@docRes')->name('student.docres');
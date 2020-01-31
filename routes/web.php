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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// All Test Routes (Api)
Route::get('test_token_expireIn', 'TestController@TokenExpireIn');
Route::get('test_routes', 'TestController@TestRoutes');
Route::post('test_login','Auth\LoginController@loginApi');
Route::post('test_register','Auth\RegisterController@registerApi');
Route::post('test_logout','Auth\LoginController@logoutApi');
Route::get('getuserdata', 'Api\ApiUserController@localGetUserData');

// Project Admin Roues
	Route::redirect('/','/admin');
	Route::redirect('/home','/admin');

// No Access To Content
	Route::view('/no-access', 'project.no-access.index');

Route::group([
	'middleware' => 'roles',
	'roles' => ['super_admin', 'student'],
	'namespace' => 'Admin'
	], function () {

	// Dashborad Routes
	Route::get('/admin', [
		'uses' => 'SystemController@showDashborad',
	]);

	// assign roles to user Route
	Route::get('check-role',[
		'uses' => 'RoleController@CheckRole',
		'middleware' => 'roles',
		'roles' => ['super_admin']
	]);
	Route::post('/assignrole',[
		'uses' => 'RoleController@assignRole',
		'as' => 'assign.roles',
		'middleware' => 'roles',
		'roles' => ['super_admin']

	]);

	// User Related Routes
	Route::get('admin/users/admins', 'UserController@AdminUsers');
	Route::get('admin/users/banned', 'UserController@BannedUsers');
	Route::get('admin/users/{id}/ban', 'UserController@BanUser');
	Route::get('admin/users/{id}/unban', 'UserController@UnBanUser');
	Route::resource('admin/users', 'UserController');

	// Exam System Routes Starts

	// Student Management Routes

	Route::get('admin/students-reports', 'StudentController@StudentReports');
	Route::post('admin/students-reports', 'StudentController@StudentReportsSpecific');
	Route::view('admin/students/import', 'project.students.importstudent');
	Route::post('admin/students/import-action', 'StudentController@StudentImport');
	Route::resource('admin/students', 'StudentController');

	// Quiz Management Routes
	Route::get('admin/quizs/questions-delete', 'QuizController@deleteQuestions');
	Route::resource('admin/quizs', 'QuizController');

	// Question Management Routes
	Route::view('admin/questions/import', 'project.questions.import');
	Route::post('admin/questions/import-action', 'QuestionController@QuestionImport');
	Route::resource('admin/questions', 'QuestionController');

	// Add Student Quizs 
	Route::get('admin/student-quiz', 'SystemController@addStudentQuiz');
	Route::post('admin/student-quiz-action', 'SystemController@addStudentQuizAction');
	Route::get('admin/batch-quiz', 'SystemController@addBatchQuiz');
	Route::post('admin/batch-quiz-action', 'SystemController@addBatchQuizAction');

	// Remove Student Quiz Action
	Route::post('admin/remove-student-quiz-action', 'SystemController@removeStudentQuizAction');
	Route::post('admin/unblock-student-quiz-action', 'SystemController@unblockStudentQuizAction');
	
});


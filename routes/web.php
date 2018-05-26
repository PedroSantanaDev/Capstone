<?php
/**
 *Author: Pedro Santana Minalla
 *Date: 23/09/2016
*/

use App\Event;

//Loads application landing page
Route::get('/', function () {
    return View('pages.welcome');
});

//Loads login page
Route::get('login', function () {
    return View('auth.login');
});

Auth::routes();

//Loads authentificated user landing page
Route::get('/home', 'HomeController@index');

Route::get('/user/profile', 'UserController@view');

Route::post('/user/update/{id}', 'UserController@update');

//User autocomplete
Route::get('/usernames', 'UserController@getData');

//Loads employee page
Route::get('/employees', 'EmployeesController@index');

//Load the "add employee" view
Route::get('/employee/add', 'EmployeesController@add');

//Load the "edit employee" view
Route::get('/employee/edit/{id}', 'EmployeesController@edit');

//Validates and updates an employee
Route::post('/employee/update/{id}', 'EmployeesController@update');

//Removes employee
Route::post('/employee/delete/{id}', 'EmployeesController@delete');

//Pass the submitted employee data to controller, validates and saves it to
//the database
Route::post('/add_employee/save', 'EmployeesController@create' );

Route::post('employees/search', 'EmployeesController@search');

//Loads template files view
Route::get('/template_files', 'TemplateFilesController@index');

//Loads template files view
Route::get('/template_files/upload', 'TemplateFilesController@upload');

//Loads template files edit view
Route::get('/template_file/edit/{id}', 'TemplateFilesController@edit');

//Loads template files edit view
Route::post('/template_file/delete/{id}', 'TemplateFilesController@destroy');

//Loads template files edit view
Route::post('/template_file/update/{id}', 'TemplateFilesController@update');

//To save a file
Route::post('/template_files/save', 'TemplateFilesController@save');

//Loads training material view
Route::get('/training_material', 'TrainingMaterialController@index');

//Loads upload training material view
Route::get('/training_material/upload', 'TrainingMaterialController@upload');

//Validates and saves new training material
Route::post('upload_training_file/save', 'TrainingMaterialController@save');

//Loads the edit training material view
Route::get('/training_material/edit/{id}', 'TrainingMaterialController@edit');

//Validates and updates a training file
Route::post('/training_material/update/{id}', 'TrainingMaterialController@update');

//Deletes a selected trainign file
Route::post('/training_material/delete/{id}', 'TrainingMaterialController@delete');

//Resource route for messages
Route::resource('messages', 'MessageController');

//Deletes a message
Route::post('messages/delete/{id}', 'MessageController@destroy');

//Set mesage as read
Route::get('messages/read/{id}', 'MessageController@setRead');

//Reply to a message
Route::get('messages/reply/{id}', 'MessageController@reply');

//Resource route for events
Route::resource('events', 'EventController');

//Updates an event
Route::post('/events/update/{id}', 'EventController@update');

//Deletes an event
Route::post('/events/delete/{id}', 'EventController@destroy');

//get calendar data
Route::get('load/calendar', function () {
    $events = Event::select('id','title', 'start', 'end')->get();
    echo json_encode($events);
});

//Loads shifts index
Route::get('/shifts', 'ShiftsController@index');

//Loads shifts edit page
Route::get('/shifts/create/', 'ShiftsController@create');

//Stores a  shifts 
Route::post('/shifts/store/', 'ShiftsController@store');

//Loads shifts edit page
Route::get('/shifts/edit/{id}', 'ShiftsController@edit');

//Loads assign shift page
Route::get('shifts/assign/{id}', 'ShiftsController@assign');

//Assigns a  shift 
Route::post('/shifts/assign/save', 'ShiftsController@assignSave');

//Updates a shift
Route::post('/shifts/update/{id}', 'ShiftsController@update');

//Updates a shift
Route::post('/shifts/delete/{id}', 'ShiftsController@destroy');

//Loads quizzes index
Route::get('/quizzes', 'QuizController@index');

//Loads create quiz form
Route::get('/quiz/create', 'QuizController@create');

//Stores a quiz
Route::post('/quiz/store', 'QuizController@store');

//Loads edit quiz form
Route::get('/quiz/edit/{id}', 'QuizController@edit');

//Loads edit quiz form
Route::post('/quiz/update/{id}', 'QuizController@update');

//Deletes quiz route call
Route::post('/quiz/delete/{id}', 'QuizController@destroy');

//Loads the take quiz view
Route::get('/quiz/take/{id}', 'QuizController@take');

//Submits a quiz
Route::post('/quiz/submit/{id}', 'QuizController@submit');

//Loads the quizzes taken by the users
Route::get('/quizzes/submitted', 'SubmittedQuizController@index');

//Deletes a submitted quiz
Route::post('/quizzes/submitted/delete/{id}', 'SubmittedQuizController@destroy');

//Loads time off view
Route::get('/timeoff', 'TimeoffController@index');

//Loads create time off request view
Route::get('/timeoff/create', 'TimeoffController@create');

//Stores a time off request
Route::post('/timeoff/store', 'TimeoffController@store');

//Triggers aprove timeoff method
Route::get('timeoff/approve/{id}', 'TimeoffController@approve');

//Triggers decline timeoff method
Route::get('timeoff/deny/{id}', 'TimeoffController@deny');

//Triggers decline timeoff method
Route::post('timeoff/delete/{id}', 'TimeoffController@destroy');

//Loads time off view
Route::get('/sharefiles', 'SharedFilesController@index');

//Loads the share a file view
Route::get('file/share', 'SharedFilesController@create');

//Loads the share a file view
Route::post('/sharedFile/save', 'SharedFilesController@store');

//Loads the share file edit view
Route::get('sharefiles/edit/{id}', 'SharedFilesController@edit');

//Updates a share file
Route::post('/sharedFile/update/{id}', 'SharedFilesController@update');

//Deletes a share file
Route::post('sharefiles/delete/{id}', 'SharedFilesController@destroy');


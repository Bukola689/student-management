<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BloodGroupController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LgaController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\ClassTypeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DormController;
use App\Http\Controllers\StudentRecordController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\StaffRecordController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ExamRecordController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\TimeTableRecordController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'super_admin'], function () {

//Route::resource('users', [UserController::class]);
Route::group([ 'prefix' => 'users.', 'middleware' => ['auth', 'super_admin']], function() {

    Route::get('index', [UserController::class, 'index'])->name('users.index');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::get('show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

});  

       

         Route::POST('/super.admin/{id}', [UserController::class, 'super_Admin'])->name('super.admin');

        Route::post('/users.search', [UserController::class, 'search'])->name('users.search');

//Route::resource('students', [UserController::class]);

     Route::group([ 'prefix' => 'exams.', 'middleware' => ['auth', 'teacher']], function() {
     Route::get('index', [ExamController::class, 'index'])->name('exams.index');
     Route::get('create', [ExamController::class, 'create'])->name('exams.create');
     Route::post('store', [ExamController::class, 'store'])->name('exams.store');
     Route::get('show/{id}', [ExamController::class, 'show'])->name('exams.show');
     Route::get('edit/{id}', [ExamController::class, 'edit'])->name('exams.edit');
     Route::put('update/{id}', [ExamController::class, 'update'])->name('exams.update');
     Route::delete('delete/{id}', [ExamController::class, 'destroy'])->name('exams.destroy');
   }); 
//Route::resource('students', [UserController::class]);

Route::group([ 'prefix' => 'profiles.', 'middleware' => ['auth']], function() {
Route::get('index', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('create', [ProfileController::class, 'create'])->name('profiles.create');
Route::post('store', [ProfileController::class, 'store'])->name('profiles.store');
Route::get('show/{id}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('edit/{id}', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('update/{id}', [ProfileController::class, 'update'])->name('profiles.update');
Route::post('password', [ProfileController::class, 'password'])->name('profiles.password');
}); 

//Route::resource('studentrecords', [studenrecordController::class]);

Route::group([ 'prefix' => 'exams.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('studentrecords.index', [StudentRecordController::class, 'index'])->name('studentrecords.index');
Route::get('studentrecords.create', [StudentRecordController::class, 'create'])->name('studentrecords.create');
Route::post('studentrecords.store', [StudentRecordController::class, 'store'])->name('studentrecords.store');
Route::get('studentrecords.show/{id}', [StudentRecordController::class, 'show'])->name('studentrecords.show');
Route::get('studentrecords.edit/{id}', [StudentRecordController::class, 'edit'])->name('studentrecords.edit');
Route::put('studentrecords.update/{id}', [StudentRecordController::class, 'update'])->name('studentrecords.update');
Route::delete('studentrecords.delete/{id}', [StudentRecordController::class, 'destroy'])->name('studentrecords.destroy');
}); 

//...staffrecord...//

Route::group([ 'prefix' => 'staffrecords.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [StaffRecordController::class, 'index'])->name('staffrecords.index');
Route::get('create', [StaffRecordController::class, 'create'])->name('staffrecords.create');
Route::post('store', [StaffRecordController::class, 'store'])->name('staffrecords.store');
Route::get('show/{id}', [StaffRecordController::class, 'show'])->name('staffrecords.show');
Route::get('edit/{id}', [StaffRecordController::class, 'edit'])->name('staffrecords.edit');
Route::put('update/{id}', [StaffRecordController::class, 'update'])->name('staffrecords.update');
Route::delete('delete/{id}', [StaffRecordController::class, 'destroy'])->name('staffrecords.destroy');
});

//....Teacher...//
/*
Route::get('teachers.index', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('teachers.create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('teachers.store', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('teachers.show/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('teachers.edit/{id}', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('teachers.update/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('teachers.delete/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

//....Teacher...//

Route::get('parents.index', [ParentController::class, 'index'])->name('parents.index');
Route::get('parents.create', [ParentController::class, 'create'])->name('parents.create');
Route::post('parents.store', [ParentController::class, 'store'])->name('parents.store');
Route::get('parents.show/{id}', [ParentController::class, 'show'])->name('parents.show');
Route::get('parents.edit/{id}', [ParentController::class, 'edit'])->name('parents.edit');
Route::put('parents.update/{id}', [ParentController::class, 'update'])->name('parents.update');
Route::delete('parents.delete/{id}', [ParentController::class, 'destroy'])->name('parents.destroy');
*/

//......blood group....//

Route::group([ 'prefix' => 'bloodgroups.', 'middleware' => ['auth', 'super_admin']], function() {
Route::get('index', [BloodGroupController::class, 'index'])->name('bloodgroups.index');
Route::get('create', [BloodGroupController::class, 'create'])->name('bloodgroups.create');
Route::post('store', [BloodGroupController::class, 'store'])->name('bloodgroups.store');
Route::get('edit/{id}', [BloodGroupController::class, 'edit'])->name('bloodgroups.edit');
Route::put('update/{id}', [BloodGroupController::class, 'update'])->name('bloodgroups.update');
Route::delete('delete/{id}', [BloodGroupController::class, 'destroy'])->name('bloodgroups.destroy');
});

//...... state ....//

Route::group([ 'prefix' => 'exams.', 'middleware' => ['auth', 'admin']], function() {
Route::get('states.index', [StateController::class, 'index'])->name('states.index');
Route::get('states.create', [StateController::class, 'create'])->name('states.create');
Route::post('states.store', [StateController::class, 'store'])->name('states.store');
Route::get('states.edit/{id}', [StateController::class, 'edit'])->name('states.edit');
Route::put('states.update/{id}', [StateController::class, 'update'])->name('states.update');
Route::delete('states.delete/{id}', [StateController::class, 'destroy'])->name('states.destroy');
});
//....lga....//

Route::group([ 'prefix' => 'lgas.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [LgaController::class, 'index'])->name('lgas.index');
Route::get('create', [LgaController::class, 'create'])->name('lgas.create');
Route::post('store', [LgaController::class, 'store'])->name('lgas.store');
Route::get('edit/{id}', [LgaController::class, 'edit'])->name('lgas.edit');
Route::put('update/{id}', [LgaController::class, 'update'])->name('lgas.update');
Route::delete('delete/{id}', [LgaController::class, 'destroy'])->name('lgas.destroy');
});

//...Nationality...//
Route::group([ 'prefix' => 'nationalities.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [NationalityController::class, 'index'])->name('nationalities.index');
Route::get('create', [NationalityController::class, 'create'])->name('nationalities.create');
Route::post('store', [NationalityController::class, 'store'])->name('nationalities.store');
Route::get('edit/{id}', [NationalityController::class, 'edit'])->name('nationalities.edit');
Route::put('update/{id}', [NationalityController::class, 'update'])->name('nationalities.update');
Route::delete('delete/{id}', [NationalityController::class, 'destroy'])->name('nationalities.destroy');
});

//...Pin...//

Route::group([ 'prefix' => 'pins.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [PinController::class, 'index'])->name('pins.index');
Route::get('create', [PinController::class, 'create'])->name('pins.create');
Route::post('store', [PinController::class, 'store'])->name('pins.store');
Route::get('edit/{id}', [PinController::class, 'edit'])->name('pins.edit');
Route::put('update/{id}', [PinController::class, 'update'])->name('pins.update');
Route::delete('delete/{id}', [PinController::class, 'destroy'])->name('pins.destroy');
});

//...skill...//
Route::group([ 'prefix' => 'skills.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [SkillController::class, 'index'])->name('skills.index');
Route::get('create', [SkillController::class, 'create'])->name('skills.create');
Route::post('store', [SkillController::class, 'store'])->name('skills.store');
Route::get('edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');
Route::PUT('update/{id}', [SkillController::class, 'update'])->name('skills.update');
Route::delete('delete/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');
});

//...classtype...//

Route::group([ 'prefix' => 'classtypes.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [ClassTypeController::class, 'index'])->name('classtypes.index');
Route::get('create', [ClassTypeController::class, 'create'])->name('classtypes.create');
Route::post('store', [ClassTypeController::class, 'store'])->name('classtypes.store');
Route::get('edit/{id}', [ClassTypeController::class, 'edit'])->name('classtypes.edit');
Route::put('update/{id}', [ClassTypeController::class, 'update'])->name('classtypes.update');
Route::delete('delete/{id}', [ClassTypeController::class, 'destroy'])->name('classtypes.destroy');
});
//...MyClass...//

Route::group([ 'prefix' => 'classes.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [MyClassController::class, 'index'])->name('classes.index');
Route::get('create', [MyClassController::class, 'create'])->name('classes.create');
Route::post('store', [MyClassController::class, 'store'])->name('classes.store');
Route::get('edit/{id}', [MyClassController::class, 'edit'])->name('classes.edit');
Route::put('update/{id}', [MyClassController::class, 'update'])->name('classes.update');
Route::delete('delete/{id}', [MyClassController::class, 'destroy'])->name('classes.destroy');
});

//...Section...//

Route::group([ 'prefix' => 'sections.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [SectionController::class, 'index'])->name('sections.index');
Route::get('create', [SectionController::class, 'create'])->name('sections.create');
Route::post('store', [SectionController::class, 'store'])->name('sections.store');
Route::get('edit/{id}', [SectionController::class, 'edit'])->name('sections.edit');
Route::put('update/{id}', [SectionController::class, 'update'])->name('sections.update');
Route::delete('delete/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');
});

//...subject...//

Route::group([ 'prefix' => 'subjects.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('store', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('update/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('delete/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
});

//...Dorm...//
Route::group([ 'prefix' => 'dorms.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [DormController::class, 'index'])->name('dorms.index');
Route::get('create', [DormController::class, 'create'])->name('dorms.create');
Route::post('store', [DormController::class, 'store'])->name('dorms.store');
Route::get('edit/{id}', [DormController::class, 'edit'])->name('dorms.edit');
Route::put('update/{id}', [DormController::class, 'update'])->name('dorms.update');
Route::delete('delete/{id}', [DormController::class, 'destroy'])->name('dorms.destroy');
});

//...examrecord...//

Route::group([ 'prefix' => 'examrecords.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [ExamRecordController::class, 'index'])->name('examrecords.index');
Route::get('create', [ExamRecordController::class, 'create'])->name('examrecords.create');
Route::post('store', [ExamRecordController::class, 'store'])->name('examrecords.store');
Route::get('edit/{id}', [ExamRecordController::class, 'edit'])->name('examrecords.edit');
Route::put('update/{id}', [ExamRecordController::class, 'update'])->name('examrecords.update');
Route::delete('delete/{id}', [ExamRecordController::class, 'destroy'])->name('examrecords.destroy');
});
//...bookrequest...//

Route::group([ 'prefix' => 'bookrequests.', 'middleware' => ['auth', 'libarian']], function() {
Route::get('index', [BookRequestController::class, 'index'])->name('bookrequests.index');
Route::get('create', [BookRequestController::class, 'create'])->name('bookrequests.create');
Route::post('store', [BookRequestController::class, 'store'])->name('bookrequests.store');
Route::get('edit/{id}', [BookRequestController::class, 'edit'])->name('bookrequests.edit');
Route::put('update/{id}', [BookRequestController::class, 'update'])->name('bookrequests.update');
Route::delete('delete/{id}', [BookRequestController::class, 'destroy'])->name('bookrequests.destroy');
});
//...Grade...//

Route::group([ 'prefix' => 'grades.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [GradeController::class, 'index'])->name('grades.index');
Route::get('create', [GradeController::class, 'create'])->name('grades.create');
Route::post('store', [GradeController::class, 'store'])->name('grades.store');
Route::get('edit/{id}', [GradeController::class, 'edit'])->name('grades.edit');
Route::put('update/{id}', [GradeController::class, 'update'])->name('grades.update');
Route::delete('delete/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');
});
//...Mark...//

Route::group([ 'prefix' => 'marks.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [MarkController::class, 'index'])->name('marks.index');
Route::get('create', [MarkController::class, 'create'])->name('marks.create');
Route::post('store', [MarkController::class, 'store'])->name('marks.store');
Route::get('edit/{id}', [MarkController::class, 'edit'])->name('marks.edit');
Route::put('update/{id}', [MarkController::class, 'update'])->name('marks.update');
Route::delete('delete/{id}', [MarkController::class, 'destroy'])->name('marks.destroy');
});

//...Time Table...//

Route::group([ 'prefix' => 'timetables.', 'middleware' => ['auth', 'admin']], function() {
Route::get('index', [TimeTableController::class, 'index'])->name('timetables.index');
Route::get('create', [TimeTableController::class, 'create'])->name('timetables.create');
Route::post('store', [TimeTableController::class, 'store'])->name('timetables.store');
Route::get('edit/{id}', [TimeTableController::class, 'edit'])->name('timetables.edit');
Route::put('update/{id}', [TimeTableController::class, 'update'])->name('timetables.update');
Route::delete('delete/{id}', [TimeTableController::class, 'destroy'])->name('timetables.destroy');
});

//.....Time slot....//
Route::group([ 'prefix' => 'timeslots.', 'middleware' => ['auth', 'admin']], function() {
Route::get('.index', [TimeSlotController::class, 'index'])->name('timeslots.index');
Route::get('create', [TimeSlotController::class, 'create'])->name('timeslots.create');
Route::post('store', [TimeSlotController::class, 'store'])->name('timeslots.store');
Route::get('edit/{id}', [TimeSlotController::class, 'edit'])->name('timeslots.edit');
Route::put('update/{id}', [TimeSlotController::class, 'update'])->name('timeslots.update');
Route::delete('delete/{id}', [TimeSlotController::class, 'destroy'])->name('timeslots.destroy');
});

//.....Time Table Record....//

Route::group([ 'prefix' => 'timetablerecords.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [TimeTableRecordController::class, 'index'])->name('timetablerecords.index');
Route::get('create', [TimeTableRecordController::class, 'create'])->name('timetablerecords.create');
Route::post('store', [TimeTableRecordController::class, 'store'])->name('timetablerecords.store');
Route::get('edit/{id}', [TimeTableRecordController::class, 'edit'])->name('timetablerecords.edit');
Route::put('update/{id}', [TimeTableRecordController::class, 'update'])->name('timetablerecords.update');
Route::delete('delete/{id}', [TimeTableRecordController::class, 'destroy'])->name('timetablerecords.destroy');
});

//.....books....//

Route::group([ 'prefix' => 'books.', 'middleware' => ['auth', 'libarian']], function() {
Route::get('index', [BookController::class, 'index'])->name('books.index');
Route::get('create', [BookController::class, 'create'])->name('books.create');
Route::post('store', [BookController::class, 'store'])->name('books.store');
Route::get('edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('update/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

//.....noticeboards....//

Route::group([ 'prefix' => 'noticeboards.', 'middleware' => ['auth', 'super_admin']], function() {
Route::get('index', [NoticeBoardController::class, 'index'])->name('noticeboards.index');
Route::get('create', [NoticeBoardController::class, 'create'])->name('noticeboards.create');
Route::post('store', [NoticeBoardController::class, 'store'])->name('noticeboards.store');
Route::get('edit/{id}', [NoticeBoardController::class, 'edit'])->name('noticeboards.edit');
Route::put('update/{id}', [NoticeBoardController::class, 'update'])->name('noticeboards.update');
Route::delete('delete/{id}', [NoticeBoardController::class, 'destroy'])->name('noticeboards.destroy');
});

//.....noticeboards....//
Route::group([ 'prefix' => 'attendances.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::post('store', [AttendanceController::class, 'store'])->name('attendances.store');
Route::get('edit/{id}', [AttendanceController::class, 'edit'])->name('attendances.edit');
Route::put('update/{id}', [AttendanceController::class, 'update'])->name('attendances.update');
Route::delete('delete/{id}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
});

//.....promotions....//

Route::group([ 'prefix' => 'promotions.', 'middleware' => ['auth', 'teacher']], function() {
Route::get('index', [PromotionController::class, 'index'])->name('promotions.index');
Route::get('create', [PromotionController::class, 'create'])->name('promotions.create');
Route::post('store', [PromotionController::class, 'store'])->name('promotions.store');
Route::get('edit/{id}', [PromotionController::class, 'edit'])->name('promotions.edit');
Route::put('update/{id}', [PromotionController::class, 'update'])->name('promotions.update');
Route::delete('delete/{id}', [PromotionController::class, 'destroy'])->name('promotions.destroy');
});

//.....promotions....//

Route::group([ 'prefix' => 'payments.', 'middleware' => ['auth']], function() {
Route::get('index', [PaymentController::class, 'index'])->name('payments.index');
Route::get('verify-payment/{reference}', [PaymentController::class, 'verify']);
//Route::post('payments.store', [PaymentController::class, 'store'])->name('payments.store');
//Route::get('payments.edit/{id}', [PaymentController::class, 'edit'])->name('payments.edit');
//Route::put('payments.update/{id}', [PaymentController::class, 'update'])->name('payments.update');
//Route::delete('payments.delete/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});

//...settings...//

Route::group([ 'prefix' => 'settings.', 'middleware' => ['auth']], function() {
Route::get('index', [SettingController::class, 'index'])->name('settings.index');
Route::get('create', [SettingController::class, 'create'])->name('settings.create');
Route::post('store', [SettingController::class, 'store'])->name('settings.store');
Route::get('edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('update/{id}', [SettingController::class, 'update'])->name('settings.update');
Route::delete('delete/{id}', [SettingController::class, 'destroy'])->name('settings.destroy');
});

Route::group([ 'prefix' => 'calender.', 'middleware' => ['auth']], function() {
Route::get('fullcalender', [EventController::class, 'index'])->name('calender.fullcalender');
Route::post('fullcalenderAjax', [EventController::class, 'ajax'])->name('calender.fullcalender');
});

Route::get('/send-mail', [StudentController::class, 'index']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

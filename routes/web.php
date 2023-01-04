<?php

use Illuminate\Support\Facades\Route;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
//admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminCalendarController;
use App\Http\Controllers\Admin\AdminDentistController; //admin
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminServiceController;

//dentist
use App\Http\Controllers\Dentist\DentistController;
use App\Http\Controllers\Dentist\DentistAppointmentController;
use App\Http\Controllers\Dentist\DentistCalendarController;
use App\Http\Controllers\Dentist\DentistPatientController;
use App\Http\Controllers\Dentist\DentistSessionController;

//receptionist
// use App\Http\Controllers\Receptionist\ReceptionistController;

use App\Models\Dentist;

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
    // return view('welcome');
    return view('auth.login');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
//prefix = /****/dashboard
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    
    // dashboard
    // index
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    // Appointment
    // index
    Route::get('appointment',[AdminAppointmentController::class,'index'])->name('admin.appointment.index');
    // get and post register dentist
    Route::get('add/appointment', [AdminAppointmentController::class,'addAppointmentForm'])->name('adminAddAppointmentForm');
    Route::post('add-appointment', [AdminAppointmentController::class,'addAppointment'])->name('adminAddAppointment');

    // Session
    // index
    Route::get('session',[AdminTreatmentController::class,'session'])->name('admin.session.index');


    // Calender
    // index
    Route::get('calendar',[AdminCalendarController::class,'index'])->name('admin.calendar.index');
    Route::post('appointment',[AdminAppointmentController::class,'store'])->name('admin.appointmentStore');
    
    // Dentist
    // index
    Route::get('dentist',[AdminDentistController::class,'index'])->name('admin.dentist.index'); 
    
    // get and post register dentist
    Route::get('add/dentist', [AdminDentistController::class,'addDentistForm'])->name('adminAddDentistForm');
    Route::post('add-dentist', [AdminDentistController::class,'addDentist'])->name('adminAddDentist');

    // Patient
    // index
    Route::get('patient',[AdminPatientController::class,'index'])->name('admin.patient.index');
    
    // get and post register patient
    Route::get('add/patient', [AdminPatientController::class,'addPatientForm'])->name('adminAddPatientForm');
    Route::post('add-patient', [AdminPatientController::class,'addPatient'])->name('adminAddPatient');

    // Service
    // index
    Route::get('service',[AdminServiceController::class,'index'])->name('admin.service.index');

    // get and post register service
    Route::get('add/service', [AdminServiceController::class,'addServiceForm'])->name('adminAddServiceForm');
    Route::post('add-service', [AdminServiceController::class,'addService'])->name('adminAddService');

    Route::get('treatment',[AdminController::class,'treatment'])->name('admin.treatment'); 
    Route::get('payment',[AdminController::class,'payment'])->name('admin.payment');

});

// DENTIST
Route::group(['prefix'=>'dentist','middleware'=>['isDentist','auth','PreventBackHistory']],function(){
    
    // dashboard
    // index
    Route::get('dashboard',[DentistController::class,'index'])->name('dentist.dashboard');

    // Appointment
    // index
    Route::get('appointment',[DentistAppointmentController::class,'index'])->name('dentist.appointment.index');
    // get and post register dentist
    Route::get('add/appointment', [DentistAppointmentController::class,'addAppointmentForm'])->name('dentistAddAppointmentForm');
    Route::post('add-appointment', [DentistAppointmentController::class,'addAppointment'])->name('dentistAddAppointment');

    Route::get('appointmentSession/{id}',[DentistAppointmentController::class,'appointmentSession'])->name('appointmentSession');

    // Session
    // Route::get('session',[DentistSessionController::class,'show'])->name('dentist.session.show');
    
    // Route::post('session',[DentistSessionController::class,'update'])->name('dentist.session.update');

    // Calender
    // index
    Route::get('calendar',[DentistCalendarController::class,'index'])->name('dentist.calendar.index');
    Route::post('appointment',[DentistAppointmentController::class,'store'])->name('dentist.appointmentStore');

    // Patient
    // index
    Route::get('patient',[DentistPatientController::class,'index'])->name('dentist.patient.index');

    // get and post register patient
    // Route::get('add/patient', [DentistPatientController::class,'addPatientForm'])->name('dentistAddPatientForm');
    // Route::post('add-patient', [DentistPatientController::class,'addPatient'])->name('dentistAddPatient');
    
    
});

Route::group(['prefix'=>'receptionist','middleware'=>['isReceptionist','auth','PreventBackHistory']],function(){
    //main page
    Route::get('dashboard',[ReceptionistController::class,'index'])->name('receptionist.dashboard');
    // Route::get('appointment',[AdminController::class,'appointment'])->name('receptionist.appointment');
    // Route::get('dentist',[AdminController::class,'dentist'])->name('receptionist.dentist');
    // Route::get('patient',[AdminController::class,'patient'])->name('receptionist.patient');
    // Route::get('payment',[AdminController::class,'payment'])->name('receptionist.payment');
});


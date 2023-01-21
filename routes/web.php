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
use App\Http\Controllers\Admin\AdminPaymentController;

//dentist
use App\Http\Controllers\Dentist\DentistController;
use App\Http\Controllers\Dentist\DentistAppointmentController;
use App\Http\Controllers\Dentist\DentistCalendarController;
use App\Http\Controllers\Dentist\DentistPatientController;
use App\Http\Controllers\Dentist\DentistSessionController;
use App\Http\Controllers\Dentist\DentistRecordController;

//receptionist
use App\Http\Controllers\Receptionist\ReceptionistController;
use App\Http\Controllers\Receptionist\ReceptionistCalendarController;
use App\Http\Controllers\Receptionist\ReceptionistAppointmentController;
use App\Http\Controllers\Receptionist\ReceptionistPaymentController;

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

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
//prefix = /****/dashboard
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {

    // DASHBOARD
    // index
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // APPOINTMENT
    // index
    Route::get('appointment', [AdminAppointmentController::class, 'index'])->name('admin.appointment.index');
    // add
    Route::get('appointment/add', [AdminAppointmentController::class, 'add'])->name('admin.appointment.add');
    Route::post('appointment/add', [AdminAppointmentController::class, 'store'])->name('admin.appointment.store');
    // edit
    Route::get('appointment/edit/{id}', [AdminAppointmentController::class, 'edit'])->name('admin.appointment.edit');
    Route::put('appointment/edit/{id}', [AdminAppointmentController::class, 'update'])->name('admin.appointment.update');
    // delete
    Route::delete('appointment/delete/{id}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointment.destroy');
   
    // SESSION
    // index
    // Route::get('session',[AdminTreatmentController::class,'session'])->name('admin.session.index');

    // CALENDAR
    // index
    Route::get('calendar', [AdminCalendarController::class, 'index'])->name('admin.calendar.index');
    Route::post('appointment', [AdminAppointmentController::class, 'store'])->name('admin.appointmentStore');

    // DENTIST
    // index
    Route::get('dentist', [AdminDentistController::class, 'index'])->name('admin.dentist.index');
    // get and post register dentist
    Route::get('add/dentist', [AdminDentistController::class, 'addDentistForm'])->name('adminAddDentistForm');
    Route::post('add-dentist', [AdminDentistController::class, 'addDentist'])->name('adminAddDentist');

    // PATIENT
    // index
    Route::get('patient', [AdminPatientController::class, 'index'])->name('admin.patient.index');
    // get and post register patient
    Route::get('add/patient', [AdminPatientController::class, 'addPatientForm'])->name('adminAddPatientForm');
    Route::post('add-patient', [AdminPatientController::class, 'addPatient'])->name('adminAddPatient');

    // TREATMENT
    // index
    Route::get('service', [AdminServiceController::class, 'index'])->name('admin.service.index');
    // get and post register treatment
    Route::get('service/add', [AdminServiceController::class, 'add'])->name('admin.service.add');
    Route::post('service/add', [AdminServiceController::class, 'store'])->name('admin.service.store');

    // PAYMENT
    Route::get('payment',[AdminPaymentController::class,'index'])->name('admin.payment.index');

});

// DENTIST
Route::group(['prefix' => 'dentist', 'middleware' => ['isDentist', 'auth', 'PreventBackHistory']], function () {

    // dashboard
    // index
    Route::get('dashboard', [DentistController::class, 'index'])->name('dentist.dashboard');

    // Appointment
    // index
    Route::get('appointment', [DentistAppointmentController::class, 'index'])->name('dentist.appointment.index');
    // get and post register dentist
    Route::get('add/appointment', [DentistAppointmentController::class, 'addAppointmentForm'])->name('dentistAddAppointmentForm');
    Route::post('add-appointment', [DentistAppointmentController::class, 'addAppointment'])->name('dentistAddAppointment');

    // Session
    // get
    Route::get('session/add/{id}', [DentistSessionController::class, 'add'])->name('dentist.session.add');
    // post
    Route::post('store/add', [DentistSessionController::class, 'store'])->name('dentist.session.store');

    // Calender
    // index
    Route::get('calendar', [DentistCalendarController::class, 'index'])->name('dentist.calendar.index');
    Route::post('appointment', [DentistAppointmentController::class, 'store'])->name('dentist.appointmentStore');

    // Patient
    // index
    Route::get('patient/index', [DentistPatientController::class, 'index'])->name('dentist.patient.index');

    // get and post register patient
    // Route::get('add/patient', [DentistPatientController::class,'addPatientForm'])->name('dentistAddPatientForm');
    // Route::post('add-patient', [DentistPatientController::class,'addPatient'])->name('dentistAddPatient');

    // Patient Record
    Route::get('patient/record/{id}', [DentistRecordController::class, 'index'])->name('dentist.patient.record.index');
    Route::get('patient/record/show/{id}', [DentistRecordController::class, 'show'])->name('dentist.patient.record.show');
});

Route::group(['prefix' => 'receptionist', 'middleware' => ['isReceptionist', 'auth', 'PreventBackHistory']], function () {
    //main page
    Route::get('dashboard', [ReceptionistController::class, 'index'])->name('receptionist.dashboard');

    // Appointment
    // index
    Route::get('appointment', [ReceptionistAppointmentController::class, 'index'])->name('receptionist.appointment.index');

    // CALENDAR
    // index
    Route::get('calendar', [ReceptionistCalendarController::class, 'index'])->name('receptionist.calendar.index');

    // PAYMENT
    Route::get('payment',[ReceptionistPaymentController::class,'index'])->name('receptionist.payment.index');
});

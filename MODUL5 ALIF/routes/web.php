<?php

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PatientController;

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

//ubah arah navbar
Route::get('/', [PageController::class, 'PageHome']);
Route::get('/vaccine', [PageController::class, 'PageVaccine'])->name('PageVaccine');
Route::get('/patient', [PageController::class, 'PagePatient'])->name('PagePatient');

//route vaccine
Route::get('/AddVaccine', [VaccineController::class, 'tambah']);
Route::post('/AddVaccine', [VaccineController::class, 'AddVaccine'])->name('AddVaccine');
Route::post('/vaccine', [VaccineController::class, 'delete'])->name('delete');
Route::get('/UpdateVaccine/{id}', [VaccineController::class, 'editview'])->name('UpdateVaccine');
Route::post('/UpdateVaccine/{id}', [VaccineController::class, 'AddUpdateVaccine'])->name('SubmitUpdateVaccine');

//route patient
Route::get('/AddPatient', [PatientController::class, 'NewPatient']);
Route::post('/ChooseVaccine', [PatientController::class, 'GiveIdVaccine'])->name('GiveIdVaccine');
Route::post('/AddPatient', [PatientController::class, 'AddDetail'])->name('AddDetail');
Route::post('patient', [PatientController::class, 'BuangOrang'])->name('BuangOrang');
Route::get('/UpdatePatient/{id}', [PatientController::class, 'editpatient'])->name('UpdatePatient');
Route::post('/UpdatePatient/{id}', [PatientController::class, 'AddUpdatePatient'])->name('SubmitUpdatePatient');
// Route::get('/', function () {
//     return view('index', [
//         "title" => "Home"
//     ]);
// });

// Route::get('/vaccine', function(){
//     return view('vaccine', [
//         "title" => "Vaccine"
//     ]);
// });

// Route::get('/patient', function(){
//     return view('patient', [
//         "title" => "Patient"
//     ]);
// });

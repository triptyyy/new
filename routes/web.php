<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Livewire\Basic;
use App\Livewire\KycTwo;


Route::post('/submit',[FormController::class, 'store'])->name('form.store');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/form',function(){
    return view('form');
});

Route::get('/success',function(){
    return 'success';
})->name('form.success');

Route::get('/kyc',function(){
    return view('kyc');
});

Route::get('/application',function(){
    return view('application');
});

Route::get('/application1',function(){
    return view('application1');
});

Route::get('/application2',function(){
    return view('application2');
});

Route::get('/kyc1',function(){
    return view('kyc1');
});

Route::post('/getprovince',function(){
    return view('kyc1');
});

Route::get("/basic", Basic::class);



// Route::get('/kyc2', [Kyc2Controller::class, 'kyc2']);
Route::get('/kyc2', KycTwo::class);

Route::post('/kyc2', [KycTwo::class, 'submitForm'])->name('kyc2.submit');


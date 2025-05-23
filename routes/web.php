<?php

use App\Http\Controllers\MailController;
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

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminContactController;

Route::get('/', function () {
    return view('contact_mail');
});

Route::post('/send', [MailController::class, "sendContactMail"])->name('send.contact_mail');

Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts');
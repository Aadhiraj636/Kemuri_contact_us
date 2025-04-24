<?php
use App\Http\Controllers\ContactController;


Route::post('/contact', [ContactController::class, 'send']);


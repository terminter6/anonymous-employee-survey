<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/questionnaire/{questionnaire}', [QuestionnaireController::class, 'show']);
Route::post('/questionnaire/{questionnaire}', [QuestionnaireController::class, 'store']);

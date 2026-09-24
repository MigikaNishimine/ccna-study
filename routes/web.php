<?php

use App\Http\Controllers\StudyItemController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/study-items');

// index / create / store / show / edit / update / destroy を一括で定義
Route::resource('study-items', StudyItemController::class);

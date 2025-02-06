<?php

use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return BaseController::errorResponse(404, [
        'error' => 'Not Found',
        'message' => 'Esta não é uma aplicação web.'
    ]);
});

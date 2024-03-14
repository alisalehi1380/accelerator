<?php

use App\Http\Controllers\API\V1\StepOne\FormController as FormOneController;
use App\Http\Controllers\API\V1\StepTwo\FormController as FormTwoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function (){
    Route::prefix('acceleration')->group(function (){
        Route::prefix('step_one')->group(function (){
            Route::prefix('store')->group(function (){
                Route::post('step_one', [FormOneController::class, 'storeStepOne']);
                Route::post('step_two', [FormOneController::class, 'storeStepTwo']);
                Route::post('step_three', [FormOneController::class, 'storeStepThree']);
                Route::post('step_four', [FormOneController::class, 'storeStepFour']);
            });
            Route::prefix('update')->group(function (){
                Route::post('step_one', [FormOneController::class, 'updateStepOne']);
                Route::post('step_two', [FormOneController::class, 'updateStepTwo']);
                Route::post('step_three', [FormOneController::class, 'updateStepThree']);
                Route::post('step_four', [FormOneController::class, 'updateStepFour']);
            });

        });
        Route::prefix('step_two')->group(function (){
            Route::prefix('store')->group(function (){
                Route::post('step_one', [FormTwoController::class, 'storeStepOne']);
                Route::post('step_two', [FormTwoController::class, 'storeStepTwo']);
                Route::post('step_three', [FormTwoController::class, 'storeStepThree']);
                Route::post('step_four', [FormTwoController::class, 'storeStepFour']);
                Route::post('step_five', [FormTwoController::class, 'storeStepFive']);
                Route::post('step_six', [FormTwoController::class, 'storeStepSix']);
                Route::post('step_seven', [FormTwoController::class, 'storeStepSeven']);
                Route::post('step_eight', [FormTwoController::class, 'storeStepEight']);
                Route::post('step_nine', [FormTwoController::class, 'storeStepNine']);
                Route::post('step_ten', [FormTwoController::class, 'storeStepTen']);
            });
            Route::prefix('update')->group(function (){
                Route::post('step_one', [FormTwoController::class, 'storeStepOne']);
                Route::post('step_two', [FormTwoController::class, 'storeStepTwo']);
                Route::post('step_three', [FormTwoController::class, 'storeStepThree']);
                Route::post('step_four', [FormTwoController::class, 'storeStepFour']);
                Route::post('step_five', [FormTwoController::class, 'storeStepFive']);
                Route::post('step_six', [FormTwoController::class, 'storeStepSix']);
                Route::post('step_seven', [FormTwoController::class, 'storeStepSeven']);
                Route::post('step_eight', [FormTwoController::class, 'storeStepEight']);
                Route::post('step_nine', [FormTwoController::class, 'storeStepNine']);
                Route::post('step_ten', [FormTwoController::class, 'storeStepTen']);
            });
        });
    });
});

<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Make sure IncidentController exists and is imported
use App\Http\Controllers\IncidentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('test', function () {
    return 'test success';
});

// Protected route
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('user', AuthController::class);

    // Route::apiResource('regions', RegionController::class);
    // Route::apiResource('divisions', DivisionController::class);
    // Route::apiResource('schools', SchoolController::class);
    // Route::apiResource('incident-types', IncidentTypeController::class);

    Route::apiResource('incidents', IncidentController::class);

    // child/simple resources (optional: nest under incidents/{incidentId}/...)
    // Route::apiResource('incident-attachments', IncidentAttachmentController::class)->only(['index','store','show','destroy']);
    // Route::apiResource('status-histories', \App\Http\Controllers\Api\StatusHistoryController::class)->only(['index','store','show']);
    // Route::apiResource('affected-populations', AffectedPopulationController::class)->only(['index','store','show','update','destroy']);
    // Route::apiResource('damage-assessments', DamageAssessmentController::class)->only(['index','store','show','update','destroy']);
    // Route::apiResource('assistance', AssistanceController::class)->only(['index','store','show','update','destroy']);

    // Route::apiResource('evacuation-centers', EvacuationCenterController::class);
    // Route::apiResource('evacuation-occupancies', EvacuationOccupancyController::class)->only(['index','store','show','update','destroy']);


});
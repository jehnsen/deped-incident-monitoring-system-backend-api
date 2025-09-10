<?php


use App\Http\Controllers\AffectedPopulationController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\DamageAssessmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvacuationCenterController;
use App\Http\Controllers\EvacuationOccupancyController;
use App\Http\Controllers\HazardAssessmentController;
use App\Http\Controllers\HazardController;
use App\Http\Controllers\IncidentAttachmentController;
use App\Http\Controllers\IncidentStatusHistoryController;
use App\Http\Controllers\IncidentTypeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\IssuanceAttachmentController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Make sure IncidentController exists and is imported
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;

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
    Route::apiResource('incidents', IncidentController::class);
    Route::apiResource('schools', SchoolController::class);
    Route::apiResource('departments', DepartmentController::class);
    Route::apiResource('divisions', DivisionController::class);
    Route::apiResource('incident-types', IncidentTypeController::class);
    Route::apiResource('incident-attachments', IncidentAttachmentController::class);
    Route::apiResource('incident-status-histories', IncidentStatusHistoryController::class);

    Route::apiResource('hazards', HazardController::class);
    Route::apiResource('hazard-assessments', HazardAssessmentController::class);
    Route::apiResource('issuances', IssuanceController::class);
    Route::apiResource('issuance-attachments', IssuanceAttachmentController::class);
    Route::apiResource('tags', TagController::class);
    
    Route::apiResource('damage-assessments', DamageAssessmentController::class);
    Route::apiResource('assistances', AssistanceController::class);

    Route::apiResource('affected-populations', AffectedPopulationController::class);
    Route::apiResource('evacuation-centers', EvacuationCenterController::class);
    Route::apiResource('evacuation-occupancies', EvacuationOccupancyController::class);

    Route::apiResource('inventories', InventoryController::class);
    Route::apiResource('programs', ProgramController::class);

});
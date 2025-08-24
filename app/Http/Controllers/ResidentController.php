<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;
use App\Http\Resources\ResidentResource;
use App\Interfaces\ResidentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Resident;
use App\Models\ResidentCrimeRecord;
use App\Models\ResidentOrganization;
use App\Services\PopulationStatisticsService;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    private ResidentRepositoryInterface $residentRepositoryInterface;
    protected PopulationStatisticsService $populationStatisticsService;

    public function __construct(
        ResidentRepositoryInterface $residentRepositoryInterface, 
        PopulationStatisticsService $populationStatisticsService
    ){
        $this->residentRepositoryInterface = $residentRepositoryInterface;
        $this->populationStatisticsService = $populationStatisticsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = $this->residentRepositoryInterface->index();
        // return ApiResponseClass::sendResponse(ResidentResource::collection($data), '', 200);

        // Pass the request to the repository to handle the filters and pagination
        $data = $this->residentRepositoryInterface->getResidentsWithFilters($request);

        // Return the paginated and filtered results
        return ApiResponseClass::sendResponse(ResidentResource::collection($data), '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResidentRequest $request)
    {

        $details = $request->only([
            'firstname',
            'middlename',
            'lastname',
            'birthdate',
            'birthplace',
            'gender',
            'civil_status',
            'religion_id',
            'nationality',
            'email',
            'contact_no',
            'purok_no',
            'household_id',
            'spouse_id',
            'spouse_name',
            'is_registered_voter',
            'precint_no',
            'status',
            'is_four_ps',
            'educ_attainment',
            'occupation',
            'residency_length',
            'resident_type',
            'tribal_affiliation',
            'img_filename',
            'suffix_name',
            'date_started',
            'employer',
            'skills',
            'certifications',
            'disabilities',
            'is_pwd',
            'livelihood_type',
            'is_farm_owner',
            'farm_location',
            'farm_type',
            'farm_land_ownership_type',
            'is_farm_irrigated',
            'farm_irrigation_type',
            'farm_annual_yield',
            'farm_land_area',
            'farming_method',
            'livestocks',

        ]);
        DB::beginTransaction();
        try{

            // Decode 'livestocks' from JSON if it's a string, to ensure it is stored as JSON in the database.
            if (isset($details['livestocks']) && is_string($details['livestocks'])) {
                $details['livestocks'] = json_decode($details['livestocks'], true);
            }
        

             $resident = $this->residentRepositoryInterface->store($details);

             // Store selected organizations for the resident
            if ($request->has('organizations')) {
                $this->storeResidentOrganizations($resident->id, $request->organizations);
            }

            // store Resident CrimeRecords
            if ($request->has('crime_records')) {
                $this->storeResidentCrimeRecords($resident->id, $request->crime_records);
            }

             DB::commit();
             return ApiResponseClass::sendResponse(new ResidentResource($resident),'Resident Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resident = $this->residentRepositoryInterface->getById($id);
        return $resident;
        // return ApiResponseClass::sendResponse(new ResidentResource($resident),'',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResidentRequest $request, $id)
    {
        // $this->authorize('update', $model);

        $updateDetails = $request->only([
            'firstname',
            'middlename',
            'lastname',
            'birthdate',
            'birthplace',
            'gender',
            'civil_status',
            'religion_id',
            'nationality',
            'email',
            'contact_no',
            'purok_no',
            'household_id',
            'spouse_id',
            'spouse_name',
            'is_registered_voter',
            'precint_no',
            'status',
            'is_four_ps',
            'educ_attainment',
            'occupation',
           'residency_length',
           'resident_type',
           'tribal_affiliation',
           'img_filename',
            'suffix_name',
            'date_started',
            'employer',
            'skills',
            'certifications',
            'disabilities',
            'is_pwd',
            'livelihood_type',
            'is_farm_owner',
            'farm_location',
            'farm_type',
            'farm_land_ownership_type',
            'is_farm_irrigated',
            'farm_irrigation_type',
            'farm_annual_yield',
            'farm_land_area',
            'farming_method',
            'livestocks',
        ]);
        DB::beginTransaction();
        try{
            //  $resident = $this->residentRepositoryInterface->update($updateDetails,$id);
            $resident = $this->residentRepositoryInterface->update($updateDetails ,$id);

             // Update selected organizations for the resident
            if ($request->has('organizations') && is_array($request->organizations) && !empty($request->organizations)) {
                $this->storeResidentOrganizations($id, $request->organizations);
            }

             DB::commit();
             return ApiResponseClass::sendResponse('Resident Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->residentRepositoryInterface->delete($id);

        return ApiResponseClass::sendResponse('Resident Delete Successful','',204);
    }

    public function updateHouseholdId($id, UpdateResidentRequest $request)
    {
        try {
            $updated = $this->residentRepositoryInterface->updateHouseholdId($id, $request->household_id);

            if ($updated) {
                DB::commit();
                return ApiResponseClass::sendResponse('Resident assigned to this household', '', 200);
            } else {
                return response()->json(['message' => 'Failed to assign to household'], 400);
            }

        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    private function storeResidentOrganizations($residentId, array $organizations)
    {
        foreach ($organizations as $organization) {
            // Check if the resident is already part of the organization
            $exists = ResidentOrganization::where('resident_id', $residentId)
                ->where('organization_id', $organization['organization_id'])
                ->exists();

            // Only add the organization if it does not already exist for the resident
            if (!$exists) {
                ResidentOrganization::create([
                    'resident_id' => $residentId,
                    'organization_id' => $organization['organization_id'],
                    'position' => $organization['position'],
                    'start_date' => $organization['start_date'],
                    'end_date' => $organization['end_date'],
                    'membership_status' => $organization['membership_status'] ?? 'active',
                ]);
            }
        }
    }

    public function deleteResidentOrganization($residentId, $organizationId)
    {
        // Attempt to find the ResidentOrganization record
        $residentOrganization = ResidentOrganization::where('resident_id', $residentId)
            ->where('organization_id', $organizationId)
            ->first();

        if (!$residentOrganization) {
            // If no record is found, return a 404 response
            return response()->json(['message' => 'Organization association not found for the resident'], 404);
        }

        // Delete the record
        $residentOrganization->delete();

        // Return a success response
        return response()->json(['message' => 'Organization association deleted successfully'], 200);
    }

    private function storeResidentCrimeRecords($residentId, array $crimeRecords)
    {
        foreach ($crimeRecords as $record) {
            ResidentCrimeRecord::create([
                'resident_id' => $residentId,
                'type' => $record['type'],
                'description' => $record['description'],
                'incident_date' => $record['date'],
                'is_guilty' => 1, //$record['is_guilty'],
                'verdict' => $record['verdict'],
                'status' => $record['status'],
            ]);
        }
    }

    public function getPopulationStatistics()
    {
        $data = $this->populationStatisticsService->getPopulationStatistics();

        return ApiResponseClass::sendResponse($data, 'Population Statistics Retrieved', 200);
    }

}

<?php

namespace App\Repositories;

use App\Http\Resources\BlotterResource;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\RecordResource;
use App\Http\Resources\ResidentTransactionResource;
use App\Interfaces\ResidentRepositoryInterface;
use App\Models\Organization;
use App\Models\Resident;
use App\Models\ResidentOrganization;
use Illuminate\Support\Facades\DB;

class ResidentRepository implements ResidentRepositoryInterface
{

    public function __construct(){

    }

    public function index(){
        return Resident::all();
    }

    public function getResidentsWithFilters($request)
    {
        $query = Resident::query();

        // Apply filters based on request parameters
        if ($request->has('purok_no')) {
            $query->where('purok_no', $request->purok_no);
            $query->orderBy('created_at', 'desc');
        }

        if ($request->has('resident_type')) {
            $query->where('resident_type', $request->resident_type);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 1);
        }

        // You can add more filters if needed
        // Add search functionality for firstname and lastname
        if ($request->has('name')) {
            $searchTerm = $request->name;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('firstname', 'like', '%' . $searchTerm . '%')
                ->orWhere('lastname', 'like', '%' . $searchTerm . '%');
            });
        }

        // Pagination: specify the number of records per page (default to 50)
        $residents = $query->paginate($request->get('per_page', 100));

        return $residents;
    }

    public function getById($id)
    {
        // Eager load the resident along with their transactions
        $resident = Resident::with([
            'transactions',
            'organizations',
            'residentOrganizations.organization',
            'filedRecords',
            'recordsFiledAgainst',
            'blotterComplaints',
            'blotterRespondents',
            'religion'
        ])->find($id);

        // If resident is not found, return a 404 response
        if (!$resident) {
            return response()->json(['message' => 'Resident not found'], 404);
        }

        return response()->json([
            'residentDetails' => [
                'firstname' => $resident->firstname,
                'middlename' => $resident->middlename,
                'lastname' => $resident->lastname,
                'suffixName' => $resident->suffix_name,
                'birthdate' => $resident->birthdate,
                'birthplace' => $resident->birthplace,
                'gender' => $resident->gender,
                'civilStatus' => $resident->civil_status,
                'nationality' => $resident->nationality,
                'religionId' => $resident->religion_id,
                'religion' => optional($resident->religion)->name,
                'contactNo' => $resident->contact_no,
                'email' => $resident->email,
                'householdId' => $resident->household_id,
                'purokNo' => $resident->purok_no,
                'spouseId' => $resident->spouse_id,
                'spouseName' => $resident->spouse_name,
                'isRegisteredVoter' => $resident->is_registered_voter,
                'precintNo' => $resident->precint_no,
                'status' => $resident->status,
                'isFourPs' => $resident->is_four_ps,
                'educationalAttainment' => $resident->educ_attainment,
                'occupation' => $resident->occupation,
                'residencyLength' => $resident->residency_length,
                'residentType' => $resident->resident_type,
                'tribalAffiliation' => $resident->tribal_affiliation,
                'imgFilename' => $resident->img_filename,
                'employer' => $resident->employer,
                'skills' => $resident->skills,
                'certifications' => $resident->certifications,
                'dateStarted' => $resident->date_started,
                'disabilities' => $resident->disabilities,
                'isPwd' => $resident->is_pwd,
                'livelihoodType' => $resident->livelihood_type,
                'isFarmOwner' => $resident->is_farm_owner,
                'farmLocation' => $resident->farm_location,
                'farmLandOwnershipType' => $resident->farm_land_ownership_type,
                'farmLandArea' => $resident->farm_land_area,
                'farmType' => $resident->farm_type,
                'isFarmIrrigated' => $resident->is_farm_irrigated,
                'farmIrrigationType' => $resident->farm_irrigation_type,
                'farmAnnualYield' => $resident->farm_annual_yield,
                'farmingMethod' => $resident->farming_method,
                'livestocks' => $resident->livestocks,
            ],
            'transactions' => ResidentTransactionResource::collection($resident->transactions),
            'complaints' => BlotterResource::collection($resident->blotterComplaints),
            'complaintsWithRespondent' => $resident->blotterComplaints->map(function ($blotter) {
                return [
                    'id' => $blotter->id,
                    'incident_type' => $blotter->incident_type,
                    'description' => $blotter->description,
                    'location' => $blotter->location,
                    'date_reported' => $blotter->date_reported,
                    'status' => $blotter->status,
                    'respondent_name' => optional($blotter->respondent)->firstname . ' ' . optional($blotter->respondent)->lastname,
                ];
            }),
            'respondents' => BlotterResource::collection($resident->blotterRespondents),
            'respondetsWithComplainant' => $resident->blotterRespondents->map(function ($blotter) {
                return [
                    'id' => $blotter->id,
                    'incident_type' => $blotter->incident_type,
                    'description' => $blotter->description,
                    'location' => $blotter->location,
                    'date_reported' => $blotter->date_reported,
                    'status' => $blotter->status,
                    'complainant_name' => optional($blotter->complainant)->firstname . ' ' . optional($blotter->complainant)->lastname,
                ];
            }),
            'organizations' => $resident->residentOrganizations->map(function ($residentOrg) {
                return [
                    'organization_id' => $residentOrg->organization->id,
                    'organization_name' => $residentOrg->organization->organization_name,
                    'position' => $residentOrg->position,
                    'description' => $residentOrg->organization->description,
                    'type' => $residentOrg->organization->type,
                    'start_date' => $residentOrg->start_date,
                    'end_date' => $residentOrg->end_date,
                    'membership_status' => $residentOrg->membership_status,
                ];
            }),
            'filedRecords' => RecordResource::collection($resident->filedRecords),
            'recordsFiledAgainst' => RecordResource::collection($resident->recordsFiledAgainst),
            'crimeRecords' => $resident->residentCrimeRecords->map(function ($crimeRecord) {
                return [
                    'type' => $crimeRecord->type,
                    'description' => $crimeRecord->description,
                    'date' => $crimeRecord->incident_date,
                    'verdict' => $crimeRecord->verdict,
                    'status' => $crimeRecord->status,
                   
                ];
            }),
        ]);
    }


    public function store(array $data){
       return Resident::create($data);
    }

    public function update(array $data,$id){
       return Resident::whereId($id)->update($data);
    }
    
    public function delete($id){
        Resident::destroy($id);
    }

    /**
     * Update the household_id of a resident
     *
     * @param int $residentId
     * @param int $householdId
     * @return bool
     */
    public function updateHouseholdId(int $residentId, int $householdId) {
        // Find the resident by ID and update only the household_id
        return Resident::where('id', $residentId)
            ->update(['household_id' => $householdId]);
    }

    public function findById($id)
    {
        return Resident::find($id);
    }

    /**
     * Get statistics including:
     * - Total residents population
     * - Total residents per purok
     * - Total households per purok
     * - Total households in the barangay
     * - Indigent families based on income_bracket
     *
     * @return array
     */
    public function getPopulationStatistics()
    {
        // 1. Total residents population
        $totalResidents = Resident::count();

        // 2. Total residents per purok
        $residentsPerPurok = Resident::select('purok_no', DB::raw('count(*) as total_residents'))
                                     ->groupBy('purok_no')
                                     ->get();

        // Return all the statistics in an array
        return [
            'total_residents' => $totalResidents,
            'residents_per_purok' => $residentsPerPurok,
        ];
    }

}

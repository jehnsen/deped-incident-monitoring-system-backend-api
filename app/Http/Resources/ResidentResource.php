<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $residentTypeString = '';
        $residentTag = '';
        switch ($this->resident_type) {
            case 1:
                $residentTypeString = 'Permanent Resident';
                break;
            case 2:
                $residentTypeString = 'Temporary Resident';
                break;
            case 3:
                $residentTypeString = 'New Resident';
                break;
            case 4:
                $residentTypeString = 'Senior Citizen';
                break;
            case 5:
                $residentTypeString = 'PWD';
                break;
            case 6:
                $residentTypeString = 'Dependent Resident';
                break;
            case 7:
                $residentTypeString = 'Indigent Resident';
                break;
            case 8:
                $residentTypeString = 'Transient';
                break;
        }

        return [
            'id' =>$this->id,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'address' => $this->address,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'birthplace' => $this->birthplace,
            'civilStatus' => $this->civil_status,
            'religion' => $this->religion,
            'nationality' => $this->nationality,
            'email' => $this->email,
            'contactNo' => $this->contact_no,
            'householdId' => $this->household_id,
            'purokNo' => $this->purok_no,
            'spouseId' => $this->spouse_id,
            'spouseName' => $this->spouse_name,
            'isRegisteredVoter' => $this->is_registered_voter,
            'precintNo' => $this->precint_no,
            'status' => $this->status,
            'isFourPs' => $this->is_four_ps,
            'educationalAttainment' => $this->educ_attainment,
            'occupation' => $this->occupation,
           'residencyLength' => $this->residency_length,
           'residentType' => $residentTypeString,
           'tribalAffiliation' => $this->tribal_affiliation,
           'imgFilename' => $this->img_filename,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}

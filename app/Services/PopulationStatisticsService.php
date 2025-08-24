<?php

namespace App\Services;

use App\Repositories\HouseholdRepository;
use App\Repositories\ResidentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PopulationStatisticsService
{
    protected $residentRepository;
    protected $householdRepository;

    public function __construct(ResidentRepository $residentRepository, HouseholdRepository $householdRepository)
    {
        $this->residentRepository = $residentRepository;
        $this->householdRepository = $householdRepository;
    }

    public function getPopulationStatistics()
    {
        // Total residents population
        $totalResidents = $this->residentRepository->index()->count();

        // Total residents per purok
        $residentsPerPurok = DB::table('residents')
            ->select('purok_no', DB::raw('count(*) as total_residents'))
            ->groupBy('purok_no')
            ->get();

        // Get total sum of each resident type (e.g.Senior Citizen, PWD)
        $residentsByType = DB::table('residents')
            ->select('resident_type', DB::raw('count(*) as total_residents'))
            ->groupBy('resident_type')
            ->get();

        $residentTypeDescriptions = [
            1 => "Permanent Resident",
            2 => "Temporary Resident",
            3 => "New Resident",
            4 => "Senior Citizen Resident",
            5 => "Person with Disability (PWD)",
            6 => "Dependent Resident",
            7 => "Indigent Resident",
            8 => "Transient"
        ];

        $residentsByType = $residentsByType->map(function ($item) use ($residentTypeDescriptions) {
            $item->resident_type_description = $residentTypeDescriptions[$item->resident_type] ?? 'Unknown';
            return $item;
        });

        // Total registered and non-registered voters
        $allRegisteredVoters = DB::table('residents')->where('is_registered_voter', '1')->count();
        $allNonRegisteredVoters = DB::table('residents')->where('is_registered_voter', '0')->count();

        // Total households per purok
        $householdsPerPurok = DB::table('households')
            ->select('purok_no', DB::raw('count(*) as total_households'))
            ->groupBy('purok_no')
            ->get();

        // Total households in the barangay
        $totalHouseholds = collect($this->householdRepository->index())->count();

        // Indigent families based on income bracket
        $indigentFamilies = DB::table('households')
            ->where('income_bracket', 'Low Income')
            ->count();

        // 6. Average household size
        $averageHouseholdSize = DB::table('residents')
            ->select(DB::raw('count(*) / (SELECT count(*) FROM households) as avg_household_size'))
            ->first()
            ->avg_household_size;
        $averageHouseholdSizeFormatted = number_format($averageHouseholdSize, 2);

        // 7. Households by income bracket (Low, Middle, High)
        $householdsByIncome = DB::table('households')
            ->select('income_bracket', DB::raw('count(*) as total_households'))
            ->groupBy('income_bracket')
            ->get();

        // 8. Breakdown of households by type (e.g., nuclear, extended, single-parent)
        $householdsByType = DB::table('households')
            ->select('household_type', DB::raw('count(*) as total_households'))
            ->groupBy('household_type')
            ->get();

        // Population growth over time, including added and removed residents
        $populationGrowth = DB::table('residents')
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_year"),
                DB::raw("SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as total_residents_added"),
                DB::raw("SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) as total_residents_removed")
            )
            ->groupBy('month_year')
            ->orderBy('month_year', 'ASC')
            ->get();

        // Total households with is_fourps = 1
        $totalFourPsHouseholds = DB::table('households')->where('is_fourps', 1)->count();

        // // Query to calculate the total residents per age bracket and per purok
        // Get the current date for age calculation
        $currentDate = Carbon::now()->format('Y-m-d');
        $populationDataPerAgeBracket = DB::table('residents')
            ->select(
                'purok_no',
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 0 AND 4 THEN 1 ELSE 0 END) as infants_and_toddlers"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 5 AND 9 THEN 1 ELSE 0 END) as early_childhood"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 10 AND 14 THEN 1 ELSE 0 END) as late_childhood"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 15 AND 19 THEN 1 ELSE 0 END) as adolescents"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 20 AND 24 THEN 1 ELSE 0 END) as young_adults"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 25 AND 29 THEN 1 ELSE 0 END) as early_working_age_adults"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 30 AND 34 THEN 1 ELSE 0 END) as early_30s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 35 AND 39 THEN 1 ELSE 0 END) as mid_to_late_30s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 40 AND 44 THEN 1 ELSE 0 END) as early_40s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 45 AND 49 THEN 1 ELSE 0 END) as mid_40s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 50 AND 54 THEN 1 ELSE 0 END) as early_50s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 55 AND 59 THEN 1 ELSE 0 END) as late_50s"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 60 AND 64 THEN 1 ELSE 0 END) as early_senior_citizens"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 65 AND 69 THEN 1 ELSE 0 END) as mid_senior_citizens"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 70 AND 74 THEN 1 ELSE 0 END) as late_senior_citizens"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') BETWEEN 75 AND 79 THEN 1 ELSE 0 END) as late_elderly"),
                DB::raw("SUM(CASE WHEN TIMESTAMPDIFF(YEAR, birthdate, '$currentDate') >= 80 THEN 1 ELSE 0 END) as super_seniors"),
                DB::raw("COUNT(*) as total_population")
            )
            ->groupBy('purok_no')
            ->get();

        // Query to count the residents based on gender and purok_no
        $populationDataPerGender = DB::table('residents')
            ->select(
                'purok_no',
                DB::raw("SUM(CASE WHEN gender = 'Male' THEN 1 ELSE 0 END) as total_males"),
                DB::raw("SUM(CASE WHEN gender = 'Female' THEN 1 ELSE 0 END) as total_females"),
                DB::raw("COUNT(*) as total_population")
            )
            ->groupBy('purok_no')
            ->orderBy(DB::raw("CAST(purok_no AS UNSIGNED)")) // Sorting by purok_no
            ->get();

        return [
            'totalResidents' => $totalResidents,
            'residentsByType' => $residentsByType,
            'residentsPerPurok' => $residentsPerPurok,
            'allRegisteredVoters' => $allRegisteredVoters,
            'allNonRegisteredVoters' => $allNonRegisteredVoters,
            'householdsPerPurok' => $householdsPerPurok,
            'totalHouseholds' => $totalHouseholds,
            'indigentFamilies' => $indigentFamilies,
            'average_household_size' => $averageHouseholdSizeFormatted,
            'households_by_income' => $householdsByIncome,
            'households_by_type' => $householdsByType,
            'populationGrowth' => $populationGrowth,
            'populationDataPerAgeBracket' => $populationDataPerAgeBracket,
            'populationDataPerGender' => $populationDataPerGender,
            'totalFourPsHouseholds' => $totalFourPsHouseholds,
        ];
    }

}


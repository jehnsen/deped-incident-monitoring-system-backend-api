<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchoolController extends Controller
{
    public function __construct(private readonly SchoolService $service)
    {
        // $this->middleware('auth:api');
    }

    /**
     * GET /api/schools
     * Optional: ?per_page=15
     */
    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 0);
        return $perPage > 0
            ? response()->json($this->service->paginate($perPage))
            : response()->json($this->service->all());
    }

    /**
     * POST /api/schools
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'            => ['required','string','max:255'],
            'code'            => ['nullable','string','max:50','unique:schools,code'],
            'division_id'     => ['nullable','integer','exists:divisions,id'],
            'address'         => ['nullable','string','max:500'],
            'contact_number'  => ['nullable','string','max:50'],
            'email'           => ['nullable','email','max:255'],
            'principal'       => ['nullable','string','max:255'],
            'latitude'        => ['nullable','numeric'],
            'longitude'       => ['nullable','numeric'],
        ]);

        $school = $this->service->create($data);

        return response()
            ->json($school, 201)
            ->header('Location', url("/api/schools/{$school->id}"));
    }

    /**
     * GET /api/schools/{id}
     */
    public function show(int|string $id): JsonResponse
    {
        return response()->json($this->service->get($id));
    }

    /**
     * PUT/PATCH /api/schools/{id}
     */
    public function update(Request $request, int|string $id): JsonResponse
    {
        $data = $request->validate([
            'name'            => ['sometimes','required','string','max:255'],
            'code'            => ['nullable','string','max:50', Rule::unique('schools','code')->ignore($id)],
            'division_id'     => ['nullable','integer','exists:divisions,id'],
            'address'         => ['nullable','string','max:500'],
            'contact_number'  => ['nullable','string','max:50'],
            'email'           => ['nullable','email','max:255'],
            'principal'       => ['nullable','string','max:255'],
            'latitude'        => ['nullable','numeric'],
            'longitude'       => ['nullable','numeric'],
        ]);

        $school = $this->service->update($id, $data);

        return response()->json($school);
    }

    /**
     * DELETE /api/schools/{id}
     */
    public function destroy(int|string $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}

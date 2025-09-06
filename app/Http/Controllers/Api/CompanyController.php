<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;


class CompanyController extends Controller
{
    protected $company;

    public function __construct(CompanyRepository $company)
    {
        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $companies = $this->company->All(); // Replace with actual data retrieval logic
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request): JsonResponse
    {
        $company = $this->company->create($request->all());
        return response()->json(['data' => $company], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nit): JsonResponse
    {
        $company = $this->company->getByNit($nit);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, int $id): JsonResponse
    {
        $updated = $this->company->update($id, $request->all());
        if ($updated) {
            return response()->json(['message' => 'Actualizado correctamente']);
        }
        return response()->json(['error' => 'No se pudo actualizar'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse|Response
    {
        $deleted = $this->company->delete($id);
        if ($deleted) {
            return response()->noContent();
        }
        return response()->json(['error' => 'Solo se puede borrar si está inactivo'], 422);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Resources\CompanyResource;
use App\Interface\CompanyRepositoryInterface;
use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    protected CompanyRepositoryInterface $companyRepo;

    public function __construct(CompanyRepositoryInterface $companyRepo)
    {
        $this->companyRepo = $companyRepo;
    }

    public function index(): JsonResponse
    {
        $companies = $this->companyRepo->all();
        return response()->json([
            'status' => 200,
            'message' => 'Companies fetched successfully',
            'data' => CompanyResource::collection($companies),
        ]);
    }

    public function store(CompanyStoreRequest $request): JsonResponse
    {
        $company = $this->companyRepo->create($request->validated());
        Mail::to('admin@example.com')->send(new CompanyCreated($company));

        return response()->json([
            'status' => 201,
            'message' => 'Company created successfully',
            'data' => new CompanyResource($company),
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $company = Company::where('id', $id)->first();
        if (!$company) {
            return response()->json([
                'status' => 404,
                'message' => 'Company not found',
                'data' => null,
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Company retrieved successfully',
            'data' => new CompanyResource($company),
        ]);
    }

    public function update(CompanyUpdateRequest $request, $id): JsonResponse
    {
        $company = $this->companyRepo->update($id, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Company updated successfully',
            'data' => new CompanyResource($company),
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $this->companyRepo->delete($id);
        return response()->json([
            'status' => 200,
            'message' => 'Company deleted successfully',
            'data' => null,
        ]);
    }
}

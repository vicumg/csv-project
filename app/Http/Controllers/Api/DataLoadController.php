<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Customer\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataLoadController extends Controller
{
    public function __construct(private readonly CustomerService $customerService)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {

       //validate if file exist
        if (!$request->hasFile('file')) {
            return response()->json([
                'message' => 'File is required',
            ], 400);
        }

        if ($request->file('file')->getClientOriginalExtension() !== 'csv') {
            return response()->json([
                'message' => 'File must be a CSV',
            ], 422);
        }

        try {
            $filename = $request->file('file')->store('file');
            $this->customerService->storeCustomers(storage_path('app/' . $filename));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error while loading data',
            ], 500);
        }

        return response()->json([
            'message' => 'Data loaded successfully',
        ], 201);
    }
}

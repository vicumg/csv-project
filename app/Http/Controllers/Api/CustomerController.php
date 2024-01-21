<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Customer\CustomerRequest;
use App\Module\Customer\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function __construct(private readonly CustomerService $customerService)
    {
    }

    public function index(CustomerRequest $request): JsonResponse
    {
        try {
            $customers = $this->customerService->getCustomers($request);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message' => 'Bad request',
            ], 400);
        }

        return response()->json([
            'data' => $customers,
        ], 200);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Http\Requests\SellerRequest;
use Illuminate\Http\JsonResponse;

class SellerController extends Controller
{
    /**
     * @param SellerRequest $request
     * @return JsonResponse
     */
    public function setData(SellerRequest $request): JsonResponse
    {
        $seller = Seller::create($request->validated());
        return response()->json($seller, 201);
    }

    /**
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $sellers = Seller::all();
        return response()->json($sellers);
    }
}

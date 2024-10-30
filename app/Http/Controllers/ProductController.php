<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Services\ImageParserService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected ImageParserService $imageParser;

    /**
     * @param ImageParserService $imageParser
     */
    public function __construct(ImageParserService $imageParser)
    {
        $this->imageParser = $imageParser;
    }

    /**
     * @return JsonResponse
     */
    public function parser(): JsonResponse
    {
        $url = 'https://rozetka.com.ua/ua/news-articles-promotions/promotions/';
        $images = $this->imageParser->getImages($url);

        if (empty($images)) {
            return response()->json(['error' => 'Unable to fetch images'], 500);
        }

        return response()->json($images);
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function setData(ProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json($product, 201);
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function bulkInsert(ProductRequest $request): JsonResponse
    {
        Product::insert($request->input('products'));

        return response()->json(['message' => 'Products inserted successfully'], 201);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getData(int $id): JsonResponse
    {
        $product = Product::getProductData($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    /**
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function updateDataBulk(ProductRequest $request): JsonResponse
    {
        $updatedCount = Product::updateBulkCost($request->input('ids'), $request->input('cost'));

        if ($updatedCount > 0) {
            return response()->json(['message' => 'Products updated successfully'], 200);
        }

        return response()->json(['error' => 'No products were updated'], 400);
    }
}


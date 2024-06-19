<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *   path="/products",
     *   summary="Get a list of products",
     *   tags={"Products"},
     *   @OA\Response(
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
     *         ),
     *   ),
     *   @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * @OA\Post(
     *     path="/products",
     *     summary="Create a new product",
     *     tags={"Products"},
     *     @OA\RequestBody(
     *         required=true,
     *         description="Product object that needs to be added to the store",
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(property="name", type="string", example="Sample Product"),
     *             @OA\Property(property="description", type="string", example="This is a sample product"),
     *             @OA\Property(property="price", type="number", format="float", example=99.99),
     *             @OA\Property(property="category_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Product created",
     *         @OA\JsonContent(
     *             ref="#/components/schemas/Product"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * @OA\Get(
     *    path="/products/{id}",
     *    summary="Get a specific product by id",
     *    tags={"Products"},
     *    @OA\Parameter(
     *         description="ID of product to fetch",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="uuid",
     *             description="A UUID string with 36 characters",
     *             example="123e4567-e89b-12d3-a456-426614174000"
     *         )
     *     ),
     *    @OA\Response(
     *      response=200, 
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Product"),
     *    ),
     *    @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * @OA\Put(
     *     path="/products/{id}",
     *     summary="Update an existing product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product to update",
     *         @OA\Schema(
     *             type="string",
     *             format="uuid",
     *             description="A UUID string with 36 characters",
     *             example="123e4567-e89b-12d3-a456-426614174000"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Product object that needs to be updated",
     *         @OA\JsonContent(
     *             required={"name", "price"},
     *             @OA\Property(property="name", type="string", example="Updated Product Name"),
     *             @OA\Property(property="description", type="string", example="Updated product description"),
     *             @OA\Property(property="price", type="number", format="float", example=150.00),
     *             @OA\Property(property="category_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Product updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=404, description="Product not found")
     * )
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product, 200);
    }

    /**
     * @OA\Delete(
     *     path="/products/{id}",
     *     summary="Delete a product",
     *     tags={"Products"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product to be deleted",
     *         @OA\Schema(
     *             type="string",
     *             format="uuid",
     *             description="A UUID string with 36 characters",
     *             example="123e4567-e89b-12d3-a456-426614174000"
     *         )
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Product deleted successfully"
     *     ),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=404, description="Product not found")
     * )
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(ProductImage::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|string',
            'is_primary' => 'boolean',
        ]);

        $productImage = ProductImage::create($validated);
        return response()->json($productImage, 201);
    }

    public function show(ProductImage $productImage)
    {
        return response()->json($productImage);
    }

    public function update(Request $request, ProductImage $productImage)
    {
        $validated = $request->validate([
            'product_id' => 'sometimes|required|exists:products,id',
            'image_path' => 'sometimes|required|string',
            'is_primary' => 'boolean',
        ]);

        $productImage->update($validated);
        return response()->json($productImage);
    }

    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

use App\Http\Resources\ProductResource;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return ProductResource::collection($products);
        // return response()->json($products);
    }

   public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
             return response()->json(['data' => $product], 200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
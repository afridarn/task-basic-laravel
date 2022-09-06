<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if (!$user->store) {
            return response()->json([
                'message' => 'You does not have a store'
            ], 400);
        }

        if (!$request->search) {
            $products = $user->store->product;
        } else {
            $products = $user->store->product->where('name', 'like',  $request->search);
        }

        return response()->json([
            'products' => $products
        ]);
    }

    public function create(Request $request)
    {
        $user = auth()->user();

        if (!$user->store) {
            return response()->json([
                'message' => 'You does not have a store'
            ], 400);
        }

        $product = $user->store->product()->create([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'price'         => $request->price,
            'description'   => $request->description,
            'photo'         => $request->photo
        ]);

        return response()->json([
            'message'   => 'Product created successfully',
            'data'      => new ProductResource($product)
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        if (!$user->store) {
            return response()->json([
                'message' => 'You does not have a store'
            ], 400);
        }

        $product = $user->store->product()->find($request->id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 400);
        }

        $product->update([
            'name'          => $request->name,
            'slug'          => Str::slug($request->name),
            'price'         => $request->price,
            'description'   => $request->description,
            'photo'         => $request->photo
        ]);

        return response()->json([
            'message'   => 'Product updated successfully',
            'data'      => new ProductResource($product)
        ]);
    }

    public function delete(Request $request)
    {
        $user = auth()->user();

        if (!$user->store) {
            return response()->json([
                'message' => 'You does not have a store'
            ], 400);
        }

        $product = $user->store->product()->find($request->id);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 400);
        }

        $product->delete();

        return response()->json([
            'message'   => 'Product deleted successfully',
        ]);
    }
}

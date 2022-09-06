<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user->store) {
            return response()->json([
                'message' => 'You does not have a store'
            ], 400);
        }

        return response()->json([
            'store' => new StoreResource($user->store)
        ]);
    }

    public function create(Request $request)
    {
        $user = auth()->user();

        if ($user->store) {
            return response()->json([
                'message' => 'You already have a store'
            ], 400);
        }

        $store = $user->store()->create([
            'name' => $request->name
        ]);

        return response()->json([
            'data' => new StoreResource($store)
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

        $id = $user->store->id;

        $store = Store::findOrFail($id);
        $store->name = $request->name;
        $store->update();

        return response()->json([
            'data' => new StoreResource($store)
        ]);
    }
}

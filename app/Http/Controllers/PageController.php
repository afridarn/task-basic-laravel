<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function about()
    {
        return view('about');
    }

    public function store()
    {

        return view('dashboard.store.hasStore', [
            'user' => Auth::user(),
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        $store = new Store();
        $store->name = request()->store;
        $store->user_id = $user->id;
        $store->save();

        return view('dashboard.store.hasStore', [
            'user' => $user,
        ])->with('success', 'Store input successfully');
    }
}

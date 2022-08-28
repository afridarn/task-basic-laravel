<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.dashboard', [
            'products' => $user->store->product,
        ]);
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store()
    {
        $user = Auth::user();
        $product = new Product();
        $product->name = request('name');
        $product->slug = Str::slug(request('name'));
        $product->description = request('description');
        $product->price = request('price');
        $product->photo = request('photo');
        $product->store_id = $user->store->id;
        $product->save();
        return redirect('/dashboard/products')->with('success', 'Product created successfully');
    }

    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->delete();

        return redirect('/dashboard/products')->with('deleted', 'Product deleted successfully');
    }

    public function updateForm($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('dashboard.update', [
            'product' => $product,
        ]);
    }

    public function update($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->name = request('name');
        $product->slug = Str::slug(request('name'));
        $product->description = request('description');
        $product->price = request('price');
        $product->photo = request('photo');
        $product->save();
        return redirect('/dashboard/products')->with('updated', 'Product updated successfully');
    }
}

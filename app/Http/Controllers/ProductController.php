<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->store) {
            $data = $user->store->product;
            if (request()->ajax()) {
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('photo', function ($row) {
                        $slug = $row->photo;
                        $render2 =
                            '
                        <img src="' . $slug . ' alt="' . $row->name . ' width="100" height"100">
                    ';

                        return $render2;
                    })
                    ->addColumn('action', function ($row) {
                        $slug = $row->slug;
                        $render =
                            '
                        <form action="/dashboard/products/update/' . $slug . ' method="GET">
                                <button class="btn btn-warning">Edit</button>
                            </form>
                        <form action="/dashboard/products/delete/' . $slug . ' method="GET">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                    ';

                        return $render;
                    })
                    ->rawColumns(['photo', 'action'])
                    ->make(true);
            }
            return view('dashboard.dashboard');
        } else {
            return view('dashboard.store.hasStore', [
                'user' => $user,
            ]);
        }
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
        $slice = Str::before($slug, ' ');
        $product = Product::where('slug', $slice)->first();
        $product->delete();

        return redirect('/dashboard/products')->with('deleted', 'Product deleted successfully');
    }

    public function updateForm($slug)
    {
        $slice = Str::before($slug, ' ');
        $product = Product::where('slug', $slice)->first();
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

<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use App\Traits\RefreshDatabaseWithData;
use Illuminate\Support\Facades\Auth;

// use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToCollection, WithHeadingRow
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new ProductsImport(),
        ];
    }

    public function collection(Collection $rows)
    {
        // $truncate = DB::table('products')->delete();
        $user = Auth::user();
        foreach ($rows as $row) {
            $user = Product::create([
                'name'      => $row['name'],
                'slug'     => Str::slug($row['name']),
                'description'  => $row['description'],
                'price'     => $row['price'],
                'photo'     => $row['photo'],
                'store_id'  => $user->store->id,
            ]);
        }
    }
}

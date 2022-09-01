<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Auth;


class ProductsExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithEvents,
    WithColumnWidths

{
    public function headings(): array
    {
        return [
            'Name',
            'Price',
            'Description',
            'Photo',
        ];
    }
    public function collection()
    {

        return Product::where('store_id', Auth::user()->store->id)->get();
    }

    public function map($product): array
    {
        return [
            $product->name,
            $product->price,
            $product->description,
            $product->photo,
        ];
    }
    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:B1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            },
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 50,
            'C' => 50,
            'D' => 50,
        ];
    }
}

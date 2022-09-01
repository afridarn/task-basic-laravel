<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use App\Traits\RefreshDatabaseWithData;


class ExcelController extends Controller
{
    public function index()
    {
        return view('dashboard.excel.index');
    }

    public function importProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $file = $request->file('file');
            $file_name = 'product' . \Carbon\Carbon::now()->isoFormat('D-M-YY-hh-mm-ss-') . $file->getClientOriginalName();
            $file_path = 'imports/product';
            $file->move($file_path, $file_name);

            try {
                $import_products = Excel::import(new ProductsImport(), public_path('/imports/product/' . $file_name));
            } catch (Exception $err) {
                return redirect()->back()->with(['error' => 'Import Failed - ' . $err->getMessage()]);
            }
            if ($import_products) {
                return redirect()->back()->with(['success' => 'Products succesfully imported']);
            }
        }
        return redirect()->back()
            ->withInput()
            ->withErrors($validator)
            ->with(['error' => 'Data Invalid']);
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}

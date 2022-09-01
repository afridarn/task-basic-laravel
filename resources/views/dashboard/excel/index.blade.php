@extends('layouts.app')
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show col-lg-8 mx-auto mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row justify-content-center mt-5">
        <div class="col-lg-5">
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center pb-4">
                    <div class="h4">Import Product</div>
                </div>
                <label>Choose File</label>
                <div class="custom-file">
                    <input required type="file" class="form-control" name="file" id="customFile">
                </div>
                <label style="font-size: 10px">Tipe file : csv,xls,xlsx</label>
                <div class="d-flex justify-content-center pb-3">
                    <button id="product-import" type="submit" class="btn btn-primary"
                        formaction="/dashboard/products/import">Import Product</button>
                </div>
            </form>
            <p class="text-center"><a href="{{ route('dashboard') }}">
                    << Back to my product</a>
            </p>
        </div>
    @endsection

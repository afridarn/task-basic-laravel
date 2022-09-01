@extends('layouts.app')
@section('content')
    @if ($user->store)
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-center mt-5">
            <h3>Your Store: {{ $user->store->name }}</h3>
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('dashboard') }}">Go to store page</a>
        </div>
    @else
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5">
                <h4>You don't have a store yet</h4>
                <form action="/dashboard/store" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="store"
                            class="form-control rounded-top @error('store') is-invalid @enderror" id="store"
                            placeholder="Store" required>
                        <label for="store">Input your store name here</label>
                        @error('store')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-40 btn btn-lg btn-primary mt-3 mx-auto" type="submit">Add</button>
                </form>
            </div>
        </div>
    @endif
@endsection

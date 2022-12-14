@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-5 mt-5">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Add New Product</h1>
                <form action="/dashboard/products/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="Name" required>
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                            id="price" placeholder="price" required>
                        <label for="price">Price</label>
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="description"
                            class="form-control @error('description') is-invalid @enderror" id="description"
                            placeholder="description" required>
                        <label for="description">Description</label>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="photo" class="form-control @error('photo') is-invalid @enderror"
                            id="photo" placeholder="photo" required>
                        <label for="photo">URL Photo</label>
                        {{-- <div class="mb-3">
                            <label for="photo" class="form-label mt-2">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                                name="photo">
                        </div> --}}
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Add</button>
                </form>
                <small class="d-block text-center mt-3"><a href="/dashboard/products">Back to dashboard</a></small>
            </main>
        </div>
    </div>
@endsection

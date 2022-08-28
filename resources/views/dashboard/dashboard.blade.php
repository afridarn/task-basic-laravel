<x-app-layout2 title='Dashboard'>
    <div>
        <h1 class="text-center">Products in {{ auth()->user()->store->name }}</h1>
    </div>
    <p class="text-center"><a href="/dashboard/products/create">Add New Product</a></p>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('deleted'))
        <div class="alert alert-info alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('updated'))
        <div class="alert alert-info alert-dismissible fade show col-lg-8 mx-auto" role="alert">
            {{ session('updated') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8 mx-auto">
        <table class="table table-striped table-sm">
            <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ $product->photo }}" alt="{{ $product->name }}" width="100"></td>
                        <td>
                            <form action="/dashboard/products/update/{{ $product->slug }}" method="PUT">
                                <button class="border-0 bg-warning text-white">Edit</button>
                            </form>
                            <form action="/dashboard/products/delete/{{ $product->slug }}" method="DELETE">
                                <button class="border-0 bg-danger text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout2>

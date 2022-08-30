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
        <table id="table-product" class="table table-striped table-sm">
            <thead i class="text-center">
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
            </tbody>
        </table>
    </div>
</x-app-layout2>

@push('scripts')
    <script>
        $(document).ready(function() {
            var datatable;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                datatable = $('#table-product').DataTable({
                    processing: true,
                    serverSide: true,
                    // order: [
                    //     [2, 'desc']
                    // ],
                    // pageLength: 2,
                    // lengthMenu: [2, 10, 50, 100],
                    // pagingType: "simple",
                    ajax: "{{ url()->current() }}",
                    columns: [{
                            data: 'DT_RowIndex'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'price'
                        },
                        {
                            data: 'description'
                        },
                        {
                            data: 'photo'
                        },
                        {
                            data: 'action'
                        }
                    ],
                });
            });
        });
    </script>

<x-app-layout2 title='Blogs' type='col-md-4 mb-3'>
    <div class="container">
        <x-card title='All Blogs'>
            @foreach ($blogs as $blog)
                <div class="card mb-3 mx-auto" style="width: 90%;">
                    <div class="card-body text-center">
                        <h6 class="card-title">{{ $blog['title'] }}</h6>
                        <p class="card-text">Author: {{ $blog['author'] }}</p>
                        <p class="card-text">{{ $blog['content'] }}</p>
                        <x-form.type.button type="submit" class="btn-primary" value="Read more"></x-form.type.button>
                    </div>
                </div>
            @endforeach
        </x-card>
    </div>
</x-app-layout2>

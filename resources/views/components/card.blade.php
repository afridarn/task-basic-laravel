{{-- <div class="card">
    <div class="card-body">
        <h5 class="card-title">
            {{ $title ?? '' }}
        </h5>
        <p class="card-text">
            {{ $slot ?? '' }}
        </p>
    </div>
</div> --}}

<div class="card mb-3 mx-auto" style="width: 50%;">
    <div class="card-body text-center">
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $slot }}</p>
    </div>
  </div>
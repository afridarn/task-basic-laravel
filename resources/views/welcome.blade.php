@extends('layouts.app')
@section('title', 'Welcome')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="fs-5 fw-bold text-dark">
                Selamat datang di <span class="text-primary">{{ config('app.name') }}</span>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mt-2">
            {{-- Anonymous component --}}
            <x-card title="Laravel Framework">
                Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
            </x-card>
        </div>
    </div>
</div>
@endsection
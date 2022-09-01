@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div class="card my3">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">IP Address</th>
                                    <th scope="col">User Agent</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Login at</th>
                                    <th scope="col">Logout at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            {{ ++$key }}
                                        </th>
                                        <td>
                                            {{ $item->ip_address }}
                                        </td>
                                        <td>
                                            {{ Str::limit($item->user_agent, 50) }}
                                        </td>
                                        <td>
                                            {{ $item->location ? $item->location['city'] : '-' }}
                                        </td>
                                        <td>
                                            {{ $item->login_at }}
                                        </td>
                                        <td>
                                            {{ $item->logout_at }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            No data found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

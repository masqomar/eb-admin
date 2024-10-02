@extends('layouts.app')

@section('title', __('Detail of Tenants'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Tenants') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of tenant.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('tenants.index') }}">{{ __('Tenants') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Detail') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                            <td class="fw-bold">{{ __('Subdomain') }}</td>
                                            <td>{{ $tenant->subdomain }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Account Bank') }}</td>
                                            <td>{{ $tenant->account_bank }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Account Number') }}</td>
                                            <td>{{ $tenant->account_number }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Account Name') }}</td>
                                            <td>{{ $tenant->account_name }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Address') }}</td>
                                            <td>{{ $tenant->address }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Snk') }}</td>
                                            <td>{{ $tenant->snk }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Subdomain Link') }}</td>
                                            <td>{{ $tenant->subdomain_link }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('User Id') }}</td>
                                            <td>{{ $tenant->user_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Phone Number') }}</td>
                                            <td>{{ $tenant->phone_number }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $tenant->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $tenant->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

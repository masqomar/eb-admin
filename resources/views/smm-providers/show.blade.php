@extends('layouts.app')

@section('title', __('Detail of Smm Providers'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Smm Providers') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of smm provider.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('smm-providers.index') }}">{{ __('Smm Providers') }}</a>
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
                                            <td class="fw-bold">{{ __('Name') }}</td>
                                            <td>{{ $smmProvider->name }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Api Id') }}</td>
                                            <td>{{ $smmProvider->api_id }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Api Key') }}</td>
                                            <td>{{ $smmProvider->api_key }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Note') }}</td>
                                            <td>{{ $smmProvider->note }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $smmProvider->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $smmProvider->updated_at->format('d/m/Y H:i') }}</td>
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

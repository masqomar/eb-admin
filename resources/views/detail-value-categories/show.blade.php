@extends('layouts.app')

@section('title', __('Detail of Detail Value Categories'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Detail Value Categories') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of detail value category.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('detail-value-categories.index') }}">{{ __('Detail Value Categories') }}</a>
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
                                            <td class="fw-bold">{{ __('Max Grade') }}</td>
                                            <td>{{ $detailValueCategory->max_grade }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Min Grade') }}</td>
                                            <td>{{ $detailValueCategory->min_grade }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Final Grade') }}</td>
                                            <td>{{ $detailValueCategory->final_grade }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Value Category') }}</td>
                                        <td>{{ $detailValueCategory->value_category ? $detailValueCategory->value_category->name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $detailValueCategory->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $detailValueCategory->updated_at->format('d/m/Y H:i') }}</td>
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

@extends('layouts.app')

@section('title', __('Detail of Grade Details'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Grade Details') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of grade detail.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('grade-details.index') }}">{{ __('Grade Details') }}</a>
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
                                        <td class="fw-bold">{{ __('Category') }}</td>
                                        <td>{{ $gradeDetail->category ? $gradeDetail->category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Exam') }}</td>
                                        <td>{{ $gradeDetail->exam ? $gradeDetail->exam->title : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $gradeDetail->user ? $gradeDetail->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Value Category') }}</td>
                                        <td>{{ $gradeDetail->value_category ? $gradeDetail->value_category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Grade') }}</td>
                                        <td>{{ $gradeDetail->grade ? $gradeDetail->grade->category_id : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Correct') }}</td>
                                            <td>{{ $gradeDetail->total_correct }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Total Wrong') }}</td>
                                            <td>{{ $gradeDetail->total_wrong }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Grade') }}</td>
                                            <td>{{ $gradeDetail->grade }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $gradeDetail->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $gradeDetail->updated_at->format('d/m/Y H:i') }}</td>
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

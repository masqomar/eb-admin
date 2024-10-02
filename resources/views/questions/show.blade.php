@extends('layouts.app')

@section('title', __('Detail of Questions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Questions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of question.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('questions.index') }}">{{ __('Questions') }}</a>
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
                                            <td class="fw-bold">{{ __('Type') }}</td>
                                            <td>{{ $question->type }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Direction') }}</td>
                                            <td>{{ $question->direction }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio Input') }}</td>
                                            <td>{{ $question->audio_input }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio') }}</td>
                                            <td>{{ $question->audio }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio Played') }}</td>
                                            <td>{{ $question->audio_played }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio Played Limit') }}</td>
                                            <td>{{ $question->audio_played_limit }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio Answer Time') }}</td>
                                            <td>{{ $question->audio_answer_time }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Audio Played Finish') }}</td>
                                            <td>{{ $question->audio_played_finish }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Value Category') }}</td>
                                        <td>{{ $question->value_category ? $question->value_category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Question Title') }}</td>
                                        <td>{{ $question->question_title ? $question->question_title->name : '' }}</td>
                                    </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Answer') }}</td>
                                            <td>{{ $question->answer }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Discussion') }}</td>
                                            <td>{{ $question->discussion }}</td>
                                        </tr>
									<tr>
                                            <td class="fw-bold">{{ __('Section') }}</td>
                                            <td>{{ $question->section }}</td>
                                        </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $question->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $question->updated_at->format('d/m/Y H:i') }}</td>
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

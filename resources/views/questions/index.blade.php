@extends('layouts.app')

@section('title', __('Questions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Questions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Below is a list of all questions.') }}
                    </p>
                </div>
                <x-breadcrumb>
                    <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Questions') }}</li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <x-alert></x-alert>

                @can('question create')
                <div class="d-flex justify-content-end">
                    <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i>
                        {{ __('Create a new question') }}
                    </a>
                </div>
                @endcan

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-1">
                                <table class="table table-striped" id="data-table" width="100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Type') }}</th>
											<th>{{ __('Direction') }}</th>
											<th>{{ __('Audio Input') }}</th>
											<th>{{ __('Audio') }}</th>
											<th>{{ __('Audio Played') }}</th>
											<th>{{ __('Audio Played Limit') }}</th>
											<th>{{ __('Audio Answer Time') }}</th>
											<th>{{ __('Audio Played Finish') }}</th>
											<th>{{ __('Value Category') }}</th>
											<th>{{ __('Question Title') }}</th>
											<th>{{ __('Answer') }}</th>
											<th>{{ __('Discussion') }}</th>
											<th>{{ __('Section') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Updated At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.css" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.0/datatables.min.js"></script>
    <script>
        $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('questions.index') }}",
            columns: [
                {
                    data: 'type',
                    name: 'type',
                },
				{
                    data: 'direction',
                    name: 'direction',
                },
				{
                    data: 'audio_input',
                    name: 'audio_input',
                },
				{
                    data: 'audio',
                    name: 'audio',
                },
				{
                    data: 'audio_played',
                    name: 'audio_played',
                },
				{
                    data: 'audio_played_limit',
                    name: 'audio_played_limit',
                },
				{
                    data: 'audio_answer_time',
                    name: 'audio_answer_time',
                },
				{
                    data: 'audio_played_finish',
                    name: 'audio_played_finish',
                },
				{
                    data: 'value_category',
                    name: 'value_category.name'
                },
				{
                    data: 'question_title',
                    name: 'question_title.name'
                },
				{
                    data: 'answer',
                    name: 'answer',
                },
				{
                    data: 'discussion',
                    name: 'discussion',
                },
				{
                    data: 'section',
                    name: 'section',
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
        });
    </script>
@endpush

@extends('layouts.app')

@section('title', __('Smm Providers'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Smm Providers') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Below is a list of all smm providers.') }}
                </p>
            </div>
            <x-breadcrumb>
                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Smm Providers') }}</li>
            </x-breadcrumb>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
    @else


    <!-- Tabel Data -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2><strong>Saldo:</strong> {{ number_format($balance) ?? 'Tidak tersedia' }}</h2>
                    <form method="GET" action="{{ route('smm-services.index') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="category">Kategori:</label>
                                <select id="category" name="category" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ $request->category == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="min_price">Harga Minimum:</label>
                                <input type="number" id="min_price" name="min_price" value="{{ $request->min_price ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="max_price">Harga Maksimum:</label>
                                <input type="number" id="max_price" name="max_price" value="{{ $request->max_price ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Filter</button>&nbsp;&nbsp;
                                <a href="{{url('smm-service.order-history')}}" class="btn btn-success">History</a>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive p-1">
                        <table class="table table-striped" id="data-table" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Nama') }}</th>
                                    <th>{{ __('Min Order') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Order') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service['id'] }}</td>
                                    <td>{{ $service['name'] }}</td>
                                    <td>{{ $service['min'] }}</td>
                                    <td>{{ $service['status'] == 1 ? 'Aktif' : 'Nonaktif' }}</td>

                                    <td>
                                        <!-- Form Order -->
                                        <form action="{{ route('smm-service.submit-order') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="service" value="{{ $service['id'] }}">
                                            <input type="text" name="target" class="form-control mb-2" placeholder="Target">
                                            <input type="number" name="quantity" class="form-control mb-2" placeholder="Jumlah" min="{{ $service['min'] }}" max="{{ $service['max'] }}">
                                            <button type="submit" class="btn btn-success">Order</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
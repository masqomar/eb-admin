@extends('layouts.app')

@section('title', __('Students'))

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-8 order-md-1 order-last">
                <h3>{{ __('Students') }}</h3>
                <p class="text-subtitle text-muted">
                    {{ __('Below is a list of all students.') }}
                </p>
            </div>
            <x-breadcrumb>
                <li class="breadcrumb-item"><a href="/">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Students') }}</li>
            </x-breadcrumb>
        </div>
    </div>

    <section class="section">
        <x-alert></x-alert>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive p-1">
                            <table class="table table-striped" id="data-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service ID</th>
                                        <th>Target</th>
                                        <th>Quantity</th>
                                        <th>Order ID (Dari API Response)</th>
                                        <th>Pesan (Dari API Response)</th>
                                        <th>Status (Dari API Response)</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($smmHistories as $history)
                                    @php
                                    // Decode kolom api_response JSON
                                    $apiResponse = json_decode($history->api_response, true);
                                    @endphp
                                    <tr>
                                        <td>{{ $history->id }}</td>
                                        <td>{{ $history->service_id }}</td>
                                        <td>{{ $history->target }}</td>
                                        <td>{{ $history->quantity }}</td>
                                        <td>{{ $apiResponse['data']['id'] ?? '-' }}</td>
                                        <td>{{ $apiResponse['msg'] ?? '-' }}</td>
                                        <td>{{ $apiResponse['status'] ? 'Berhasil' : 'Gagal' }}</td>
                                        <td>{{ $history->created_at }}</td>
                                        <td>{{ $history->updated_at }}</td>
                                        <td>
                                            <button class="cek-status" data-order-id="{{ $apiResponse['data']['id'] }}">Cek Status</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Modal untuk menampilkan hasil API -->
                            <div id="statusModal" style="display:none; padding: 20px; border: 1px solid black; background-color: #f9f9f9;">
                                <h3>Status Pesanan</h3>
                                <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
                                <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                                <p><strong>Charge:</strong> <span id="modalCharge"></span></p>
                                <p><strong>Start Count:</strong> <span id="modalStartCount"></span></p>
                                <p><strong>Remains:</strong> <span id="modalRemains"></span></p>
                                <p><strong>Pesan:</strong> <span id="modalMessage"></span></p>
                                <button onclick="closeModal()">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function closeModal() {
        $('#statusModal').hide();
    }

    $(document).ready(function() {
        $('.cek-status').click(function() {
            var orderId = $(this).data('order-id');

            $.ajax({
                url: "{{ route('smm-service.cek-status') }}", // Route ke backend
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId
                },
                success: function(response) {
                    if (response.status) {
                        // Masukkan data API ke dalam modal
                        $('#modalOrderId').text(response.data.id);
                        $('#modalStatus').text(response.data.status);
                        $('#modalCharge').text(response.data.charge);
                        $('#modalStartCount').text(response.data.start_count);
                        $('#modalRemains').text(response.data.remains);
                        $('#modalMessage').text(response.msg);

                        // Tampilkan modal
                        $('#statusModal').show();
                    } else {
                        alert('Pesanan tidak ditemukan.');
                    }
                },
                error: function(xhr, status, error) {
                    alert("Terjadi kesalahan: " + xhr.responseText);
                }
            });
        });
    });
</script>
@endpush
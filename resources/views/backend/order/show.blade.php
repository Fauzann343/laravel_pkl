@extends('layouts.backend')

@section('content')
<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-detail d-inline"></i> Detail Pesanan
        </div>

        <div class="card-body">
            <!-- Informasi Pemesan -->
            <h5 class="text-uppercase fw-bold text-muted mb-3">Informasi Pemesan</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <strong>Nama:</strong> {{ $order->user->name }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <strong>Email:</strong> {{ $order->user->email }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <strong>Tanggal Pesanan:</strong> {{ $order->created_at->format('d M Y, H:i') }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <strong>Kode Order:</strong> {{ $order->order_code }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-3 bg-light">
                        <strong>Status:</strong>
                        <span class="badge
                            {{ $order->status == 'pending' ? 'bg-warning' : '' }}
                            {{ $order->status == 'success' ? 'bg-success' : '' }}
                            {{ $order->status == 'cancel' ? 'bg-danger' : '' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Daftar Produk -->
            <h5 class="text-uppercase fw-bold text-muted mb-3">Daftar Produk</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">{{ $item->pivot->qty }}</td>
                            <td>Rp {{ number_format($item->pivot->qty * $item->pivot->price, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total</td>
                            <td class="fw-bold">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Ganti Status -->
            <div class="mt-4">
                <h5 class="text-uppercase fw-bold text-muted mb-3">Ubah Status Order</h5>
                <form action="{{ route('backend.orders.update', $order->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select name="status" class="form-select rounded">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Success</option>
                                <option value="cancel" {{ $order->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
                            </select>
                        </div>
                        <div class="col-md-4 d-grid">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </div>
                    </div>
                </form>
            </div>

            <a href="{{ route('backend.orders.index') }}" class="btn btn-secondary">
                Kembali ke Daftar Pesanan
            </a>
        </div>
    </div>
</div>
@endsection
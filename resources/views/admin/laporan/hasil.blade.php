<!-- resources/views/admin/laporan/hasil.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Laporan Penjualan Bulan {{ DateTime::createFromFormat('!m', $bulan)->format('F') }} Tahun {{ $tahun }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Order</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->created_at }}</td>

                                <td>Rp {{ number_format($order->total, 2, ',', '.') }}</td> <!-- Format mata uang -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
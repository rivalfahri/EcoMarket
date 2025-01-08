<!-- resources/views/admin/discounts/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Diskon</h1>
        <a href="{{ route('admin.discounts.create') }}" class="btn btn-primary">Tambah Diskon</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Diskon</th>
                            <th>Kode Diskon</th>
                            <th>Jumlah</th>

                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($discounts as $discount)
                            <tr>
                                <td>{{ $discount->id }}</td>
                                <td>{{ $discount->name }}</td>
                                <td>{{ $discount->code }}</td>
                                <td>{{ $discount->amount }} {{ $discount->type == 'percentage' ? '%' : 'IDR' }}</td>
                                <td>{{ $discount->start_date->format('d-m-Y H:i') }}</td>
                                <td>{{ $discount->end_date->format('d-m-Y H:i') }}</td>
                                <td>{{ $discount->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    <a href="{{ route('admin.discounts.edit', $discount->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
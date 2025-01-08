<!-- resources/views/admin/discounts/create.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Diskon</h1>
    </div>

    <form action="{{ route('admin.discounts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Diskon</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="code">Kode Diskon</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="form-group">
            <label for="amount">Jumlah Diskon</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <div class="form-group">
            <label for="type">Tipe Diskon</label>
            <select class="form-control" id="type" name="type" required>
                <option value="percentage">Persentase</option>
                <option value="fixed">Nominal</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Tanggal Berakhir</label>
            <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection
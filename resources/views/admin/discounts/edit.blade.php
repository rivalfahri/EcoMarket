@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Discount</h1>

    <!-- Form -->
    <div class="card shadow mb-4" style="max-width: 400px; margin: 0 auto;">
        <div class="card-body">
            <form action="{{ route('admin.discounts.edit', $discount->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Kategori</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $discount->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Kode Discount</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $discount->code }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Jumlah</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $discount->amount }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Tanggal Mulai</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $discount->start_date }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="name">Tanggal Berakhir</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $discount->end_date }}"
                        required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
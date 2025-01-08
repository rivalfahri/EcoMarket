@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Laporan Penjualan</h1>

    <form action="{{ route('laporan.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="bulan">Pilih Bulan:</label>
            <select name="bulan" id="bulan" class="form-control">
                @php
                    $months = [
                        1 => 'January',
                        2 => 'February',
                        3 => 'March',
                        4 => 'April',
                        5 => 'May',
                        6 => 'June',
                        7 => 'July',
                        8 => 'August',
                        9 => 'September',
                        10 => 'October',
                        11 => 'November',
                        12 => 'December'
                    ];
                @endphp
                @foreach ($months as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tahun">Pilih Tahun:</label>
            <input type="number" name="tahun" id="tahun" class="form-control" min="2000" max="2099"
                value="{{ date('Y') }}">
        </div>
        <button type="submit" class="btn btn-primary">Generate Laporan</button>
    </form>
</div>
@endsection
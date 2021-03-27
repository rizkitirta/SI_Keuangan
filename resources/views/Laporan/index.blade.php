@extends('layouts.master')
@section('title', 'Laporan Keuangan')
@section('page', 'Laporan Keuangan')
@section('content')

    <form action="{{ route('laporan.cari') }}" method="get">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Dari</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Select date" type="text" name="dari" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Sampai</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Select date" type="text" name="sampai"
                    autocomplete="off">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Cari</button>
    </form>

    {{-- //Data Pemasukan --}}
    @if (isset($pemasukan))
        <div class="row mt-4">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h2 class="text-white mb-0 text-center">Data Pemasukan</h2>
                        <a href="{{ url('/laporan-keuangan/export-excel/' . $dari . '/' . $sampai) }}"
                            class="btn btn-warning">Export To Excel</a>
                    </div>
                    <div class="table-responsive">
                        <table id="table-pemasukan" class="table align-items-center table-light table-flush">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="status">Keterangan </th>
                                    <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                                    <th scope="col" class="sort" data-sort="completion">Sumber</th>
                                    <th scope="col" class="sort" data-sort="completion">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemasukan as $e => $dt)
                                    <tr class="text-center">
                                        <td>{{ $e + 1 }}</td>
                                        <td>{{ $dt->keterangan }}</td>
                                        <td>{{ date('Y-m-d', strtotime($dt->tanggal)) }}</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>Rp.{{ number_format($dt->nominal) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" align="right"><strong>Total Harga : </strong> </td>
                                    <td align="center"> <strong>Rp.{{ number_format($total_pengeluaran) }}</strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- //Data Pengeluaran --}}
    @if (isset($pengeluaran))
        <div class="row mt-4">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h2 class="text-white mb-0 text-center">Data Pengeluaran</h2>
                        <a href="{{ url('/laporan-keuangan/export-excel/' . $dari . '/' . $sampai) }}"
                            class="btn btn-warning">Export To Excel</a>
                    </div>
                    <div class="table-responsive">
                        <table id="table-pemasukan" class="table align-items-center table-light table-flush">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="status">Keterangan </th>
                                    <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                                    <th scope="col" class="sort" data-sort="completion">Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $e => $dt)
                                    <tr class="text-center">
                                        <td>{{ $e + 1 }}</td>
                                        <td>{{ $dt->keterangan }}</td>
                                        <td>{{ date('Y-m-d', strtotime($dt->tanggal)) }}</td>
                                        <td>Rp.{{ number_format($dt->nominal) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" align="right"><strong>Total Harga : </strong> </td>
                                    <td align="center"> <strong>Rp.{{ number_format($total_pengeluaran) }}</strong> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker();
        })

    </script>
@endsection

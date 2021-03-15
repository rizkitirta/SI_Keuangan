@extends('layouts.master')
@section('page', 'Managemen-pengeluaran')
@section('content')
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="text-white mb-0 text-center">Managemen Pengeluaran</h2>
                </div>
                <div class="table-responsive">
                    <a href="{{ route('pengeluaran.add') }}" class="btn btn-sm btn-outline-primary ml-3 mb-3 mt-1">Tambah
                        Pengeluaran</a>
                    <table id="table-pemasukan" class="table align-items-center table-light table-flush">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="status">Nominal </th>
                                <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                                <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $e => $dt)
                                <tr class="text-center">
                                    <td>{{ $e + 1 }}</td>
                                    <td>Rp. {{ number_format($dt->nominal, 0) }}</td>
                                    <td>{{ date('Y-m-d', strtotime($dt->tanggal)) }}</td>
                                    <td>{{ $dt->keterangan }}</td>
                                    <td>
                                        <center>
                                            <a href="{{ route('pengeluaran.edit', $dt->pengeluaran_id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                            <form method="POST" id="delete-form-{{ $dt->pengeluaran_id }}"
                                                action="{{ route('pengeluaran.delete', $dt->pengeluaran_id) }} "
                                                style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                            </form>
                                            <a onclick=" if(confirm('Hapus Pengeluaran?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $dt->pengeluaran_id }}').submit();
                                                   }else
                                                   { event.preventDefault(); }							
                                                   
                                                   " href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                                Delete</a>
                                        </center>
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

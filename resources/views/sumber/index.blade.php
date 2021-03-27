@extends('layouts.master')
@section('page', 'Managemen-Sumber-Pemasukan')
@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="text-white mb-0">Managemen Sumber Pemasukan</h2>
                </div>
                <div class="table-responsive">
                    <a href="{{ route('sumber.add') }}" class="btn btn-sm btn-outline-primary ml-3 mb-3 mt-1">Tambah
                        Sumber Pemasukan</a>
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">Nama</th>
                                <th scope="col" class="sort" data-sort="status">Created </th>
                                <th scope="col" class="sort" data-sort="completion">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($data as $index => $dt)
                                <tr>
                                    <td>{{ $index++ }}</td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/sumber-pemasukan/edit/' . $dt->id) }}"
                                            class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit</a> |
                                        <form method="POST" id="delete-form-{{ $dt->id }}"
                                            action="{{ route('sumber.delete', $dt->id) }} " style="display: none">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                        <a onclick=" if(confirm('Hapus Sumber Pemasukan?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $dt->id }}').submit();
                                                   }else
                                                   { event.preventDefault(); }							
                                                   
                                                   " href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                                            Delete</a>
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

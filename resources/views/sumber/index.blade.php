@extends('layouts.master')
@section('page', 'Managemen-Sumber-Pemasukan')
@section('content')
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="text-white mb-0 text-center">Managemen Sumber Pemasukan</h2>
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
    <div class="col-md-4">
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
            aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-notification">Message</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Apakah Anda Yakin?</h4>
                            </p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <form method="POST" action="{{ url('/sumber-pemasukan/delete/' . $dt->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-white" type="submit">Delete</button>
                        </form>
                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('page', 'Managemen-pemasukan')
@section('content')
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h2 class="text-white mb-0 text-center">Managemen Pemasukan</h2>
                </div>
                <div class="table-responsive">
                    <a href="{{ route('pemasukan.add') }}" class="btn btn-sm btn-outline-primary ml-3 mb-3 mt-1">Tambah Pemasukan</a>
                    <table id="table-pemasukan" class="table align-items-center table-light table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="budget">Sumber Pemasukan</th>
                                <th scope="col" class="sort" data-sort="status">Nomnial </th>
                                <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                                <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script type="text/javascript">
	$(document).ready(function(){
       $('#table-pemasukan').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('manage.pemasukan.yajra') }}',
        columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'rownum', name: 'rownum'},
            {data: 'nama', name: 'nama'},       
            {data: 'nominal', name: 'nominal'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'keterangan', name: 'keterangan'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
          ]
       });
	});
	</script>
@endsection

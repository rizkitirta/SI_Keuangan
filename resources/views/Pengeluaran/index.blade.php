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
                    <a href="{{ route('pengeluaran.add') }}" class="btn btn-sm btn-outline-primary ml-3 mb-3 mt-1">Tambah Pengeluaran</a>
                    <table id="table-pemasukan" class="table align-items-center table-light table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">#</th>
                                <th scope="col" class="sort" data-sort="status">Nomnial </th>
                                <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                                <th scope="col" class="sort" data-sort="completion">Keterangan</th>
                                <th scope="col" class="sort" data-sort="completion">Action</th>
                            </tr>
                        </thead>
						<tbody>
                            @foreach ($data as $e=>$dt)
								<tr>
									<td>{{ $e+1 }}</td>
									<td>{{ $dt->nominal }}</td>
									<td>{{ $dt->tanggal }}</td>
									<td>{{ $dt->keterangan }}</td>
									<td>
										<a href="" class="btn btn-sm btn-primary">Edit</a>
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

@section('script')
	<script type="text/javascript">
	$(document).ready(function(){
      
	});
	</script>
@endsection

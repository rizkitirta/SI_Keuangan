@extends('layouts.master')
@section('page', 'Edit')
@section('content')
    <form action="{{ url('/sumber-pemasukan/edit/'. $data->id) }}" method="POST">
        {{ csrf_field() }}
		{{ method_field('put') }}
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Nama</label>
            <input class="form-control" type="text" value="{{ $data->nama }}" name="nama" 
			id="nama" placeholder="Masukan Keterangan">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

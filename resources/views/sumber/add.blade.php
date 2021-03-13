@extends('layouts.master')
@section('page', 'Add')
@section('content')
    <form action="{{ url('/sumber-pemasukan/add') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="example-text-input" class="form-control-label text-white">Description</label>
            <input class="form-control" type="text" value="" name="nama" id="nama" placeholder="Masukan Keterangan">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

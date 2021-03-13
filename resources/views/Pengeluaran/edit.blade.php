@extends('layouts.master')
@section('content')
    <form action="{{ route('pengeluaran.update', $data->pengeluaran_id) }}" method="POST">
        {{ @csrf_field() }}
		{{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Nominal</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nominal"
                name="nominal" value="{{ $data->nominal }}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Tanggal</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Select date" type="text"
                    value="{{ date('Y-m-d', strtotime($data->tanggal)) }}" name="tanggal">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-control-label text-white">Keterangan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan">{{ $data->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-success"> Submit</button>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker();
        })

    </script>
@endsection

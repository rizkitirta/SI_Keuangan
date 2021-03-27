@extends('layouts.master')
@section('content')
    <form action="{{ route('pemasukan.update', $data->pemasukan_id) }}" method="POST">
        {{ csrf_field() }}
		{{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleFormControlSelect1" class="form-control-label text-white">Pilih Sumber Pemasukan</label>
            <select class="form-control" id="exampleFormControlSelect1" name="sumber">
                <option selected="" disabled="">Pilih Sumber Pemasukan</option>
                @foreach ($sumbers as $sumber)
                    <option value="{{ $sumber->id }}" {{ $data->sumber_pemasukan == $sumber->id ? 'selected' : '' }}>
                        {{ $sumber->nama }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Nominal</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nominal"
                name="nominal" value="{{ $data->nominal }}" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-control-label text-white">Tanggal</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div> 
                <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2020"
                    value="{{ date('m/d/Y', strtotime($data->tanggal)) }}" autocomplete="off" name="tanggal">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-control-label text-white">Keterangan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                name="keterangan" autocomplete="off">{{ $data->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.datepicker').datepicker();
        });
    </script>
@endsection
